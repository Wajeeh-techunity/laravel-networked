@extends('partials/dashboard_header')
@section('content')
    @error('campaign_name')
        <style>
            #campaign_name {
                border: 1px solid red;
                margin-bottom: 7px !important;
            }
        </style>
    @enderror
    @error('campaign_url')
        <style>
            #campaign_url {
                border: 1px solid red;
                margin-bottom: 7px !important;
            }
        </style>
    @enderror
    <script>
        var campaign = {!! json_encode($campaign) !!};
    </script>
    <section class="main_dashboard blacklist  campaign_sec">
        <div class="container_fluid">
            <div class="row">
                <div class="col-lg-1">
                    @include('partials/dashboard_sidebar_menu')
                </div>
                <div class="col-lg-11 col-sm-12">
                    <div class="row crt_cmp_r">
                        <div class="col-12">
                            <div class="d-flex align-items-center justify-content-between w-100">
                                <div class="cont">
                                    <h3>Campaigns</h3>
                                    <p>Choose between options and get your campaign running</p>
                                </div>
                                <div class="cmp_opt_link d-flex">
                                    <ul class="d-flex list-unstyled justify-content-end align-items-center">
                                        <li class="active"><span>1</span><a href="javascript:;">Campaign info</a></li>
                                        <li><span>2</span><a href="javascript:;">Campaign settings</a></li>
                                        <li><span>3</span><a href="javascript:;">Campaign steps</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row insrt_cmp_r">
                        <div class="border_box">
                            <div class="insrt_cont">
                                <p>What type of the campaign you will be running?</p>
                                <div class="crt_cmp_opt">
                                    <ul class="nav nav-tabs list-unstyled d-flex justify-content-between align-items-center"
                                        role="tablist">
                                        <li class="nav-item border_box">
                                            <a class="nav-link campaign_tab" data-toggle="tab" href="javascript:;"
                                                data-bs-target="tabs-1" role="tab">
                                                <img src="{{ asset('assets/img/linkedin.svg') }}" alt="">
                                                <title>Linkedin search result</title>
                                            </a>
                                        </li>
                                        <li class="nav-item border_box">
                                            <a class="nav-link campaign_tab" data-toggle="tab" href="javascript:;"
                                                data-bs-target="tabs-2" role="tab">
                                                <img src="{{ asset('assets/img/navigation.svg') }}" alt="">
                                                <title>Sales navigator search result</title>
                                            </a>
                                        </li>
                                        <li class="nav-item border_box">
                                            <a class="nav-link campaign_tab" data-toggle="tab" href="javascript:;"
                                                data-bs-target="tabs-3" role="tab">
                                                <img src="{{ asset('assets/img/recruiter.svg') }}" alt="">
                                                <title>Recruiter search result</title>
                                            </a>
                                        </li>
                                        <li class="nav-item border_box">
                                            <a class="nav-link campaign_tab" data-toggle="tab" href="javascript:;"
                                                data-bs-target="tabs-4" role="tab">
                                                <img src="{{ asset('assets/img/import.svg') }}" alt="">
                                                <title>Import</title>
                                            </a>
                                        </li>
                                        <li class="nav-item border_box">
                                            <a class="nav-link campaign_tab" data-toggle="tab" href="javascript:;"
                                                data-bs-target="tabs-5" role="tab">
                                                <img src="{{ asset('assets/img/engagement.svg') }}" alt="">
                                                <title>Post engagement</title>
                                            </a>
                                        </li>
                                        <li class="nav-item border_box">
                                            <a class="nav-link campaign_tab" data-toggle="tab" href="javascript:;"
                                                data-bs-target="tabs-6" role="tab">
                                                <img src="{{ asset('assets/img/list.svg') }}" alt="">
                                                <title>Leads list</title>
                                            </a>
                                        </li>
                                    </ul><!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane campaign_pane" id="tabs-1" role="tabpanel">
                                            <form method="POST" id="campaign_form_1" class="campaign_form"
                                                action="{{ route('editCampaignInfo', ['campaign_id' => $campaign->id]) }}">
                                                @csrf
                                                <div class="row">
                                                    <input type="hidden" id="campaign_type" name="campaign_type"
                                                        value="linkedin" required>
                                                    <div class="col-lg-4 col-sm-12">
                                                        <label for="campaign_name">Campaign Name:</label>
                                                        <input type="text" id="campaign_name" class="campaign_name"
                                                            name="campaign_name"
                                                            placeholder="Campaign name ex. Los angeles lead"
                                                            value="{{ $campaign->campaign_name }}" required>
                                                        @error('campaign_name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-lg-4 col-sm-12">
                                                        <label for="campaign_url">LinkedIn URL:</label>
                                                        <input type="url" id="campaign_url" class="campaign_url"
                                                            name="campaign_url" placeholder="LinkedIn search URL"
                                                            value="{{ $campaign->campaign_url }}" required>
                                                        @error('campaign_url')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-lg-4 col-sm-12">
                                                        <label for="campaign_connection">Connections:</label>
                                                        <select id="connections" name="campaign_connection"
                                                            class="connections">
                                                            <option value="1" {{ $campaign->campaign_connection == '1' ? 'selected' : '' }}>
                                                                1st-degree
                                                            </option>
                                                            <option value="2" {{ $campaign->campaign_connection == '2' ? 'selected' : '' }}>
                                                                2nd-degree
                                                            </option>
                                                            <option value="3" {{ $campaign->campaign_connection == '3' ? 'selected' : '' }}>
                                                                3rd-degree
                                                            </option>
                                                            <option value="o" {{ $campaign->campaign_connection == 'o' ? 'selected' : '' }}>Other
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane campaign_pane" id="tabs-2" role="tabpanel">
                                            <form method="POST" id="campaign_form_2" class="campaign_form"
                                                action="{{ route('editCampaignInfo', ['campaign_id' => $campaign->id]) }}">
                                                @csrf
                                                <div class="row">
                                                    <input type="hidden" id="campaign_type" name="campaign_type"
                                                        value="sales_navigator" required>
                                                    <div class="col-lg-4 col-sm-12">
                                                        <label for="campaign_name">Campaign Name:</label>
                                                        <input type="text" id="campaign_name" class="campaign_name"
                                                            name="campaign_name"
                                                            placeholder="Campaign name ex. Los angeles lead"
                                                            value="{{ $campaign->campaign_name }}" required>
                                                        @error('campaign_name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-lg-4 col-sm-12">
                                                        <label for="campaign_url">Navigator URL:</label>
                                                        <input type="url" id="campaign_url" class="campaign_url"
                                                            name="campaign_url" placeholder="LinkedIn search URL"
                                                            value="{{ $campaign->campaign_url }}" required>
                                                        @error('campaign_url')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-lg-4 col-sm-12">
                                                        <label for="campaign_connection">Connections:</label>
                                                        <select id="connections" name="campaign_connection"
                                                            class="connections">
                                                            <option value="1" {{ $campaign->campaign_connection == '1' ? 'selected' : '' }}>
                                                                1st-degree
                                                            </option>
                                                            <option value="2" {{ $campaign->campaign_connection == '2' ? 'selected' : '' }}>
                                                                2nd-degree
                                                            </option>
                                                            <option value="3" {{ $campaign->campaign_connection == '3' ? 'selected' : '' }}>
                                                                3rd-degree
                                                            </option>
                                                            <option value="o" {{ $campaign->campaign_connection == 'o' ? 'selected' : '' }}>Other
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane campaign_pane" id="tabs-3" role="tabpanel">
                                            <form method="POST" id="campaign_form_3" class="campaign_form"
                                                action="{{ route('editCampaignInfo', ['campaign_id' => $campaign->id]) }}">
                                                @csrf
                                                <div class="row">
                                                    <input type="hidden" id="campaign_type" name="campaign_type"
                                                        value="recruiter" required>
                                                    <div class="col-lg-6 col-sm-12">
                                                        <label for="campaign_name">Campaign Name:</label>
                                                        <input type="text" id="campaign_name" class="campaign_name"
                                                            name="campaign_name"
                                                            placeholder="Campaign name ex. Los angeles lead"
                                                            value="{{ $campaign->campaign_name }}" required>
                                                        @error('campaign_name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-lg-6 col-sm-12">
                                                        <label for="campaign_url">Recruiter URL:</label>
                                                        <input type="url" id="campaign_url" class="campaign_url"
                                                            name="campaign_url" placeholder="LinkedIn search URL"
                                                            value="{{ $campaign->campaign_url }}" required>
                                                        @error('campaign_url')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane campaign_pane" id="tabs-4" role="tabpanel">
                                            <form method="POST" id="campaign_form_4" class="campaign_form"
                                                action="{{ route('editCampaignInfo', ['campaign_id' => $campaign->id]) }}">
                                                @csrf
                                                <div class="row">
                                                    <input type="hidden" id="campaign_type" name="campaign_type"
                                                        value="import" required>
                                                    <div class="col-lg-6 col-sm-12">
                                                        <label for="campaign_name">Campaign Name:</label>
                                                        <input type="text" id="campaign_name" class="campaign_name"
                                                            name="campaign_name"
                                                            placeholder="Campaign name ex. Los angeles lead"
                                                            value="{{ $campaign->campaign_name }}" required>
                                                        @error('campaign_name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-lg-6 col-sm-12">
                                                        <label for="campaign_url">Import URL:</label>
                                                        <div class="import_field">
                                                            <input type="file" id="campaign_url"
                                                                class="file-input__input" class="campaign_url"
                                                                name="campaign_url" placeholder="LinkedIn search URL"
                                                                required>
                                                            <label class="file-input__label" for="file-input">
                                                                <svg aria-hidden="true" focusable="false"
                                                                    data-prefix="fas" data-icon="upload"
                                                                    class="svg-inline--fa fa-upload fa-w-16"
                                                                    role="img" xmlns="http://www.w3.org/2000/svg"
                                                                    viewBox="0 0 512 512">
                                                                    <path fill="currentColor"
                                                                        d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z">
                                                                    </path>
                                                                </svg>
                                                                <span>Upload file</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane campaign_pane" id="tabs-5" role="tabpanel">
                                            <form method="POST" id="campaign_form_5" class="campaign_form"
                                                action="{{ route('editCampaignInfo', ['campaign_id' => $campaign->id]) }}">
                                                @csrf
                                                <div class="row">
                                                    <input type="hidden" id="campaign_type" name="campaign_type"
                                                        value="post_engagement" required>
                                                    <div class="col-lg-4 col-sm-12">
                                                        <label for="campaign_name">Campaign Name:</label>
                                                        <input type="text" id="campaign_name" class="campaign_name"
                                                            name="campaign_name"
                                                            placeholder="Campaign name ex. Los angeles lead"
                                                            value="{{ $campaign->campaign_name }}" required>
                                                        @error('campaign_name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-lg-4 col-sm-12">
                                                        <label for="campaign_url">Post engagement:</label>
                                                        <input type="url" id="campaign_url" class="campaign_url"
                                                            name="campaign_url" placeholder="LinkedIn search URL"
                                                            value="{{ $campaign->campaign_url }}" required>
                                                        @error('campaign_url')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-lg-4 col-sm-12">
                                                        <label for="campaign_connection">Connections:</label>
                                                        <select id="connections" name="campaign_connection"
                                                            class="connections">
                                                            <option value="1" {{ $campaign->campaign_connection == '1' ? 'selected' : '' }}>
                                                                1st-degree
                                                            </option>
                                                            <option value="2" {{ $campaign->campaign_connection == '2' ? 'selected' : '' }}>
                                                                2nd-degree
                                                            </option>
                                                            <option value="3" {{ $campaign->campaign_connection == '3' ? 'selected' : '' }}>
                                                                3rd-degree
                                                            </option>
                                                            <option value="o" {{ $campaign->campaign_connection == 'o' ? 'selected' : '' }}>Other
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane campaign_pane" id="tabs-6" role="tabpanel">
                                            <form method="POST" id="campaign_form_6" class="campaign_form"
                                                action="{{ route('editCampaignInfo', ['campaign_id' => $campaign->id]) }}">
                                                @csrf
                                                <div class="row">
                                                    <input type="hidden" id="campaign_type" name="campaign_type"
                                                        value="leads_list" required>
                                                    <div class="col-lg-4 col-sm-12">
                                                        <label for="campaign_name">Campaign Name:</label>
                                                        <input type="text" id="campaign_name" class="campaign_name"
                                                            name="campaign_name"
                                                            placeholder="Campaign name ex. Los angeles lead"
                                                            value="{{ $campaign->campaign_name }}" required>
                                                        @error('campaign_name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-lg-4 col-sm-12">
                                                        <label for="campaign_url">Leads list :</label>
                                                        <input type="url" id="campaign_url" class="campaign_url"
                                                            name="campaign_url" placeholder="LinkedIn search URL"
                                                            value="{{ $campaign->campaign_url }}" required>
                                                        @error('campaign_url')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-lg-4 col-sm-12">
                                                        <label for="campaign_connection">Connections:</label>
                                                        <select id="connections" name="campaign_connection"
                                                            class="connections">
                                                            <option value="1" {{ $campaign->campaign_connection == '1' ? 'selected' : '' }}>
                                                                1st-degree
                                                            </option>
                                                            <option value="2" {{ $campaign->campaign_connection == '2' ? 'selected' : '' }}>
                                                                2nd-degree
                                                            </option>
                                                            <option value="3" {{ $campaign->campaign_connection == '3' ? 'selected' : '' }}>
                                                                3rd-degree
                                                            </option>
                                                            <option value="o" {{ $campaign->campaign_connection == 'o' ? 'selected' : '' }}>Other
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="cmp_btns d-flex justify-content-center align-items-center">
                                <a href="{{ route('campaigns') }}" class="btn"><i
                                        class="fa-solid fa-arrow-left"></i>Back</a>
                                <a class="btn nxt_btn">Next<i class="fa-solid fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
