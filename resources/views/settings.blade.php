@extends('partials/dashboard_header')
@section('content')
<style>
    .alert.alert-danger.alert-dismissible {
    background: #870000;
    border: none;
    border-radius: 30px;
    padding: 20px;
    text-align: center;
    color: #fff;
}
.alert.alert-danger.alert-dismissible .close {
    height: 50px;
    width: 50px;
    opacity: 1;
    font-weight: 400;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 2px solid #fff;
    border-radius: 100%;
    position: absolute;
    top: 5px;
    right: 10px;
}
</style>
    <section class="main_dashboard blacklist  campaign_sec lead_sec setting_sec">
        <div class="container_fluid">
            <div class="row">
                <div class="col-lg-1">
                    @include('partials/dashboard_sidebar_menu')
                </div>
                <div class="col-lg-11 col-sm-12">
                    @if (session()->has('add_account'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Add Account! </strong> You should add linkedin account first.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if (session()->has('delete_account'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Disconnected! </strong> Linkedin disconnected successfully.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex align-items-center justify-content-between w-100 setting_head">
                                <h3>Settings</h3>
                                <div class="filt_opt d-flex">
                                    <p>Customize settings for your account. Highest limits are imposed by <br>LinkedIn
                                        system itself and very by type of premium account.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="comp_tabs setting_tabs">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link setting_tab active" data-toggle="tab" href="javascript;"
                                            role="tab" data-bs-target="LinkedIn">LinkedIn settings</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link setting_tab" data-toggle="tab" href="javascript;" role="tab"
                                            data-bs-target="email_setting">Email settings</a>
                                    </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content border_box">
                                    <!-- Leads Content -->
                                    <div class="tab-pane setting_pane active" id="LinkedIn" role="tabpanel">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link linkedin_setting {{ session()->has('add_account') ? '' : 'active' }}" data-bs-target="Global" data-toggle="tab" href="javascript;"
                                                    role="tab">Global limits for
                                                    campaigns</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link linkedin_setting" data-bs-target="health"
                                                    data-toggle="tab" href="javascript;" role="tab">Account health</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link linkedin_setting {{ session()->has('add_account') ? 'active' : '' }}" data-bs-target="integrations" data-toggle="tab" href="javascript;"
                                                    role="tab">LinkedIn
                                                    integrations</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane linkedin_pane global_tab {{ session()->has('add_account') ? '' : 'active' }}"
                                                id="Global" role="tabpanel">
                                                <h6>Time zone</h6>
                                                <form action="" method="" class="time_zone_form">
                                                    <div class="input_fields">
                                                        <label for="timezone">Your Time Zone:</label>
                                                        <select name="timezone" id="timezone">
                                                            <option value="GMT">(GMT - 01:00) Central European Time
                                                            </option>
                                                            <option value="EST">EST</option>
                                                            <option value="PST">PST</option>
                                                            <!-- Add more time zones as needed -->
                                                        </select>
                                                    </div>
                                                    <div class="input_fields">
                                                        <label for="start_time">Start Time:</label>
                                                        <input type="time" name="start_time" placeholder="10 : 00"
                                                            id="start_time" required>
                                                    </div>
                                                    <div class="input_fields">
                                                        <label for="end_time">End Time:</label>
                                                        <input type="time" name="end_time" placeholder="23 : 00"
                                                            id="end_time" required>
                                                    </div>
                                                </form>
                                                <div class="globle_list">
                                                    @for ($i = 0; $i < 6; $i++)
                                                        <div class="grey_box d-flex align-items-center">
                                                            <div class="eye_img">
                                                                <img src="{{ asset('assets/img/eye.png') }}" alt="">
                                                            </div>
                                                            <div class="cont">
                                                                <h4>Profile views</h4>
                                                                Sed ut perspiciatis unde omnis iste natus error sit
                                                                voluptatem accusantium doloremque laudantium, totam rem
                                                                aperiam, eaque ipsa quae ab illo inventore veritatis et
                                                                quasi architecto beatae vitae dicta sunt explicabo.
                                                            </div>
                                                            <div class="slider">
                                                                <div class="cont">
                                                                    <span>50</span>
                                                                    <span>100</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endfor
                                                </div>
                                            </div>
                                            <div class="tab-pane linkedin_pane health_tab" id="health" role="tabpanel">
                                                <div class="account_health">
                                                    <div class="grey_box d-flex align-items-center">
                                                        <div class="cont">
                                                            <h4>Choose how many pending connections you want to have</h4>
                                                            If you have too many pending invitations, you may not be able to
                                                            invite more people to connect.
                                                        </div>
                                                        <div class="slider">
                                                            <div class="cont">
                                                                <span>50</span>
                                                                <span>100</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="grey_box d-flex align-items-center">

                                                        <div class="cont">
                                                            <h4>Automatically delete oldest pending invitations to keep
                                                                count less than 1100</h4>
                                                            If you have too many pending invitations, you may not be able to
                                                            invite more people to connect.
                                                        </div>
                                                        <div class="switch_box"><input type="checkbox" class="switch"
                                                                id="switch0"><label for="switch0">Toggle</label></div>
                                                    </div>
                                                    <div class="grey_box d-flex align-items-center">

                                                        <div class="cont">
                                                            <h4>Run on weekends</h4>
                                                            Choose if you want actions to be taken over the weekend
                                                        </div>
                                                        <div class="switch_box"><input type="checkbox" class="switch"
                                                                id="switch1"><label for="switch1">Toggle</label></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane linkedin_pane integrations_tab {{ session()->has('add_account') ? 'active' : '' }}" id="integrations" role="tabpanel">
                                                <h4>Connect your LinkedIn account</h4>
                                                @if ($data['paymentStatus'] == 'success' && !empty($data['account']) && !empty($data['account']['account']) && $seatData['connected'])
                                                    <div class="grey_box d-flex align-items-center">
                                                        <div class="linked">
                                                            <div class="cont">
                                                                <i class="fa-brands fa-linkedin"></i>
                                                                <div class="head_cont">
                                                                    <span class="head">LinkedIn</span>
                                                                    <span>Connected account: {{ $data['account']['account']['name'] }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @if ($seatData['connected'])
                                                            <div class="con">Status: Connected</div>
                                                            <div class="add_btn">
                                                                <a href="javascript:;" class="disconnect_account" type="button"><img
                                                                        class="img-fluid"
                                                                        src="{{ asset('assets/img/disconnect.png') }}"
                                                                        alt=""></a>Disconnect
                                                            </div>
                                                        @else
                                                            <div class="con">Status: Not Connected</div>
                                                        @endif
                                                    </div>
                                                    <!--<div class="grey_box d-flex align-items-center">-->
                                                    <!--    <h6>Change your LinkedIn subscription</h6>-->
                                                    <!--    <div class="radio-buttons">-->
                                                    <!--        <label for="premium">-->
                                                    <!--            <input type="radio" name="linkedinSubscription"-->
                                                    <!--                id="premium" value="premium">-->
                                                    <!--            <span></span>-->
                                                    <!--            LinkedIn Premium-->
                                                    <!--        </label>-->
                                                    <!--        <label for="salesNavigator">-->
                                                    <!--            <input type="radio" name="linkedinSubscription"-->
                                                    <!--                id="salesNavigator" value="salesNavigator">-->
                                                    <!--            Sales Navigator-->
                                                    <!--            <span></span>-->
                                                    <!--        </label>-->
                                                    <!--        <label for="recruiter">-->
                                                    <!--            <input type="radio" name="linkedinSubscription"-->
                                                    <!--                id="recruiter" value="recruiter">-->
                                                    <!--            LinkedIn Recruiter-->
                                                    <!--            <span></span>-->
                                                    <!--        </label>-->
                                                    <!--    </div>-->
                                                    <!--</div>-->
                                                @else
                                                    <input type="hidden" id="user_email" value="{{ $data['seat_id'] }}">
                                                    <button id="submit-btn" type="button" class="theme_btn mb-3">Connect Linked in</button>
                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                    <!-- Step Content -->
                                    <div class="tab-pane setting_pane email_setting" id="email_setting" role="tabpanel">
                                        <div class="filtr_desc">
                                            <div class="d-flex justify-content-end">
                                                <strong></strong>
                                                <div class="filter">
                                                    <form action="/search" method="get" class="search-form">
                                                        <input type="text" name="q"
                                                            placeholder="Search Campaig here...">
                                                        <button type="submit">
                                                            <i class="fa fa-search"></i>
                                                        </button>
                                                    </form>
                                                    <div class="add_btn ">
                                                        <a href="javascript:;" class="" type="button"
                                                            data-bs-toggle="modal" data-bs-target="#add_email"><i
                                                                class="fa-solid fa-plus"></i></a>Add email account
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                        <table class="data_table w-100">
                                            <thead>
                                                <tr>
                                                    <th width="20%">Name</th>
                                                    <th width="20%">Email</th>
                                                    <th width="20%">Daily limits</th>
                                                    <th width="20%">Email delay</th>
                                                    <th width="20%">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                        <div class="grey_box">
                                            <div class="add_cont">
                                                <p>No email account. Start by connecting your first email account.</p>
                                                <div class="add">
                                                    <a href="javascript:;" type="button" data-bs-toggle="modal"
                                                        data-bs-target="#add_email"><i
                                                            class="fa-solid fa-plus"></i></a>Add email account
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Modal Add Email Accounts -->
    <div class="modal fade create_sequence_modal add_email" id="add_email" tabindex="-1" aria-labelledby="add_email"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="sequance_modal">Add email account</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                            class="fa-solid fa-xmark"></i></button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="row">
                            <div class="col-12">
                                <p>Select your email provider</p>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="border_box">
                                            <div class="email_box_img">
                                                <img src="{{ asset('assets/img/gmail.png') }}" alt="">
                                                <span>Gmail</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="border_box">
                                            <div class="email_box_img">
                                                <img src="{{ asset('assets/img/outlook.png') }}" alt="">
                                                <span>Outlook</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="border_box">
                                            <div class="email_box_img">
                                                <img src="{{ asset('assets/img/web-browser.png') }}" alt="">
                                                <span>Custom SMTP server</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{ session()->forget('add_account') }}
    {{ session()->forget('delete_account') }}
    <script>
        $(document).ready(function() {
            $('#submit-btn').on('click', function() {
                $.ajax({
                    url: '/api/create-link-account',
                    type: 'POST',
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                    data: {
                        'email': $('#user_email').val()
                    },
                    success: function(response) {
                        console.log(response);

                        if (response.status === 'success' && response.data && response.data
                            .url) {
                            console.log(response.data);
                            console.log(response.data.url);
                            window.open(response.data.url, '_blank');
                        }
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
            $('.disconnect_account').on('click', function() {
               $.ajax({
                    url: '/delete_an_account',
                    type: 'GET',
                    success: function(response) {
                        if (response.success) {
                            window.location.reload();
                        } else {
                            console.log(response);
                        }
                    },
                    error: function(error) {
                        console.error(error);
                    }
               });
            });
        });
    </script>
@endsection
