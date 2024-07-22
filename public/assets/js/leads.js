$(document).ready(function () {
    $("#search_lead").on("input", filter_search);
    $("#campaign").on("change", filter_search);

    $(".lead_tab").on("click", function (e) {
        e.preventDefault();
        $(".lead_tab").removeClass("active");
        $(this).addClass("active");
        var id = $(this).data("bs-target");
        $(".lead_pane").removeClass("active");
        $("#" + id).addClass("active");
    });

    function setting_list() {
        $(".setting_list").hide();
        $(".setting_btn").on("click", function (e) {
            $(".setting_list").not($(this).siblings(".setting_list")).hide();
            $(this).siblings(".setting_list").toggle();
        });
        $(document).on("click", function (e) {
            if (!$(event.target).closest(".setting").length) {
                $(".setting_list").hide();
            }
        });
    }

    function filter_search(e) {
        e.preventDefault();
        var campaign_id = $("#campaign").val();
        var search = $("#search_lead").val();
        if (search === "") {
            search = "null";
        }
        $.ajax({
            url: leadsCampaignFilterPath
                .replace(":id", campaign_id)
                .replace(":search", search),
            type: "GET",
            beforeSend: function () {
                $("#loader").show();
            },
            success: function (response) {
                if (response.success) {
                    var leads = response.leads;
                    var html = ``;
                    for (var key in leads) {
                        html += `<tr style="z-index: 999;"><td><div class="switch_box"><input type="checkbox" class="switch"`;
                        if (leads[key]["is_active"] == 1) {
                            html += ` checked `;
                        }
                        html += `id="` + leads[key]["id"] + `"><label for="`;
                        html +=
                            leads[key]["id"] + `">Toggle</label></div></td>`;
                        html +=
                            `<td class="title_cont">` +
                            leads[key]["contact"] +
                            `</td>`;
                        html +=
                            `<td class="title_comp">` +
                            leads[key]["title_company"] +
                            `</td>`;
                        html += `<td class="">`;
                        if (leads[key]["send_connections"] == "1") {
                            html += `<div class="per connected">Connected</div>`;
                        } else {
                            html += `<div class="per discovered">Discovered</div>`;
                        }
                        html += `</td><td>23</td>`;
                        html += `<td>` + leads[key]["next_step"] + `</td>`;
                        var createdAtDate = new Date(leads[key]["created_at"]);
                        var now = new Date();
                        var diffMs = now - createdAtDate;
                        var diffDays = Math.floor(
                            diffMs / (1000 * 60 * 60 * 24)
                        );
                        html +=
                            `<td><div class="">` +
                            diffDays +
                            ` days ago</div></td>`;
                        html += `<td><a href="javascript:;" type="button" class="setting setting_btn"`;
                        html += `id=""><i class="fa-solid fa-gear"></i></a>`;
                        html += `<ul class="setting_list" style="display: block;">`;
                        html += `<li><a href="#">Edit</a></li><li><a href="#">Delete</a></li>`;
                        html += `</ul></td>`;
                        html += `</tr>`;
                    }
                    $(".leads_list table tbody").html(html);
                } else {
                    var html = ``;
                    html += `<tr style="z-index: 999;"><td colspan="8"><div class="text-center text-danger" `;
                    html += `style="font-size: 25px; font-weight: bold;`;
                    html += ` font-style: italic;">Not Found!</div></td></tr>`;
                    $(".leads_list table tbody").html(html);
                }
                if (response.campaign) {
                    var campaign = response.campaign;
                    $("#campaign-name").val(campaign[0]["campaign_name"]);
                    $("#linkedin-url").val(campaign[0]["campaign_url"]);
                    const timestamp = campaign[0]["created_at"];
                    const formattedTimestamp = new Date(timestamp)
                        .toISOString()
                        .replace("T", " ")
                        .slice(0, 16);
                    $("#created_at").html(
                        '<i class="fa-solid fa-calendar-days"></i>Created at: ' +
                        formattedTimestamp
                    );
                } else {
                    $("#campaign-name").val("");
                    $("#linkedin-url").val("");
                    const currentDate = new Date();
                    const year = currentDate.getFullYear();
                    const month = String(currentDate.getMonth() + 1).padStart(
                        2,
                        "0"
                    );
                    const day = String(currentDate.getDate()).padStart(2, "0");
                    const hours = String(currentDate.getHours()).padStart(
                        2,
                        "0"
                    );
                    const minutes = String(currentDate.getMinutes()).padStart(
                        2,
                        "0"
                    );
                    const formattedDate = `${year}-${month}-${day} ${hours}:${minutes}`;
                    $("#created_at").html(
                        '<i class="fa-solid fa-calendar-days"></i>Created at: ' +
                        formattedDate
                    );
                }
                $(".setting_btn").on("click", setting_list);
                $(".setting_list").hide();
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            },
            complete: function () {
                $("#loader").hide();
            },
        });
    }

    $("#export_leads").on("click", function (e) {
        var form = $("#export_form");
        var campaign_id = $("#campaign").val();
        var email = form.find("#export_email").val();
        var csrfToken = $('meta[name="csrf-token"]').attr("content");
        var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (emailPattern.test(email)) {
            form.find("#export_email").css({
                border: "1px solid oklch(0.69 0.12 216.55 / 0.6)",
                color: "#16adcb",
            });
            $("#email_error").text("").css({
                display: "none",
            });
            $.ajax({
                url: sendLeadsToEmail,
                type: "POST",
                data: {
                    _token: csrfToken,
                    email: email,
                    campaign_id: campaign_id,
                },
                beforeSend: function () {
                    $("#loader").show();
                },
                success: function (response) {
                    if (response.success) {
                        $("#export_modal").modal("hide");
                    }
                },
                error: function (xhr, status, error) {
                    console.error(error);
                },
                complete: function () {
                    $("#loader").hide();
                },
            });
        } else {
            form.find("#export_email").css({
                border: "1px solid red",
            });
            $("#email_error").text("Insert valid email").css({
                display: "block",
            });
        }
    });
});
