@include('admin.header')
<!-- End Sidebar -->
<div class="main-panel bg-light">
    <div class="content bg-light">
        <div class="page-inner">
            @if(session('message'))
            <div class="alert alert-success mb-2">{{session('message')}}</div>
            @endif
            <div class="mt-2 mb-3 d-inline">
                <h1 class="title1 text-dark d-inline mr-4">App Settings</h1>
                <a href="#" class=" btn btn-sm btn-warning text-canter">
                    Clear Cache
                </a>
            </div>

            <div>
            </div>
            <div>
            </div>
            <div class="mt-2 mb-5 row">
                <div class="col-12">
                    <div class="card p-md-5 p-2 shadow-lg bg-light">
                        <ul class="nav nav-pills">
                            <li class="nav-item">
                                <a href="#info" class="nav-link active" data-toggle="tab">Website Information</a>
                            </li>
                            <li class="nav-item">
                                <a href="#pref" class="nav-link" data-toggle="tab">Preference</a>
                            </li>
                            <li class="nav-item">
                                <a href="#email" class="nav-link" data-toggle="tab">Email/Google Login-Captcha</a>
                            </li>

                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="info">
                                <div class="row">
                                    <div class="col-12">
                                        <form method="POST" action="{{route('web.info')}}"
                                            enctype="multipart/form-data">
                                            {{ csrf_field()}}
                                            <div class=" form-row">
                                                <div class="form-group col-md-6">
                                                    <h5 class="text-dark">Website Name</h5>
                                                    <input type="text" name="name"
                                                        class="form-control bg-light text-dark"
                                                        value="{{$web_info->name}}" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <h5 class="text-dark">Website Title</h5>
                                                    <input type="text" name="title"
                                                        class="form-control bg-light text-dark"
                                                        value="{{$web_info->title}}" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <h5 class="text-dark">Website Keywords</h5>
                                                    <input type="text" name="keyword"
                                                        class="form-control bg-light text-dark"
                                                        value="{{$web_info->keyword}}" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <h5 class="text-dark">Website Url (https://yoursite.com)</h5>
                                                    <input type="text" placeholder="https://yoursite.com" name="url"
                                                        class="form-control bg-light text-dark"
                                                        value="{{$web_info->url}}" required>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <h5 class="text-dark">Website Description</h5>
                                                    <textarea name="description" class="form-control bg-light text-dark"
                                                        rows="4">{{$web_info->description}}</textarea>
                                                </div>
                                            </div>

                                            <div class=" form-row">
                                                <div class="form-group col-md-12">
                                                    <h5 class="text-dark">Announcement</h5>
                                                    <textarea name="announcement"
                                                        class="form-control bg-light text-dark"
                                                        rows="2">{{$web_info->announcement}}</textarea>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <h5 class="text-dark">Live chat widget Code</h5>
                                                    <textarea name="widget" class="form-control bg-light text-dark"
                                                        rows="4">{{$web_info->widget}}</textarea>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <h5 class="text-dark">Timezone</h5>
                                                    <select name="timezone"
                                                        class="form-control bg-light text-dark select2">
                                                        <option selected>{{$web_info->timezone}}</option>
                                                        <option>UTC</option>
                                                        <option value="Africa/Abidjan">Africa/Abidjan</option>
                                                        <option value="Africa/Accra">Africa/Accra</option>
                                                        <option value="Africa/Addis_Ababa">Africa/Addis_Ababa</option>
                                                        <option value="Africa/Algiers">Africa/Algiers</option>
                                                        <option value="Africa/Asmara">Africa/Asmara</option>
                                                        <option value="Africa/Bamako">Africa/Bamako</option>
                                                        <option value="Africa/Bangui">Africa/Bangui</option>
                                                        <option value="Africa/Banjul">Africa/Banjul</option>
                                                        <option value="Africa/Bissau">Africa/Bissau</option>
                                                        <option value="Africa/Blantyre">Africa/Blantyre</option>
                                                        <option value="Africa/Brazzaville">Africa/Brazzaville</option>
                                                        <option value="Africa/Bujumbura">Africa/Bujumbura</option>
                                                        <option value="Africa/Cairo">Africa/Cairo</option>
                                                        <option value="Africa/Casablanca">Africa/Casablanca</option>
                                                        <option value="Africa/Ceuta">Africa/Ceuta</option>
                                                        <option value="Africa/Conakry">Africa/Conakry</option>
                                                        <option value="Africa/Dakar">Africa/Dakar</option>
                                                        <option value="Africa/Dar_es_Salaam">Africa/Dar_es_Salaam
                                                        </option>
                                                        <option value="Africa/Djibouti">Africa/Djibouti</option>
                                                        <option value="Africa/Douala">Africa/Douala</option>
                                                        <option value="Africa/El_Aaiun">Africa/El_Aaiun</option>
                                                        <option value="Africa/Freetown">Africa/Freetown</option>
                                                        <option value="Africa/Gaborone">Africa/Gaborone</option>
                                                        <option value="Africa/Harare">Africa/Harare</option>
                                                        <option value="Africa/Johannesburg">Africa/Johannesburg</option>
                                                        <option value="Africa/Juba">Africa/Juba</option>
                                                        <option value="Africa/Kampala">Africa/Kampala</option>
                                                        <option value="Africa/Khartoum">Africa/Khartoum</option>
                                                        <option value="Africa/Kigali">Africa/Kigali</option>
                                                        <option value="Africa/Kinshasa">Africa/Kinshasa</option>
                                                        <option value="Africa/Lagos">Africa/Lagos</option>
                                                        <option value="Africa/Libreville">Africa/Libreville</option>
                                                        <option value="Africa/Lome">Africa/Lome</option>
                                                        <option value="Africa/Luanda">Africa/Luanda</option>
                                                        <option value="Africa/Lubumbashi">Africa/Lubumbashi</option>
                                                        <option value="Africa/Lusaka">Africa/Lusaka</option>
                                                        <option value="Africa/Malabo">Africa/Malabo</option>
                                                        <option value="Africa/Maputo">Africa/Maputo</option>
                                                        <option value="Africa/Maseru">Africa/Maseru</option>
                                                        <option value="Africa/Mbabane">Africa/Mbabane</option>
                                                        <option value="Africa/Mogadishu">Africa/Mogadishu</option>
                                                        <option value="Africa/Monrovia">Africa/Monrovia</option>
                                                        <option value="Africa/Nairobi">Africa/Nairobi</option>
                                                        <option value="Africa/Ndjamena">Africa/Ndjamena</option>
                                                        <option value="Africa/Niamey">Africa/Niamey</option>
                                                        <option value="Africa/Nouakchott">Africa/Nouakchott</option>
                                                        <option value="Africa/Ouagadougou">Africa/Ouagadougou</option>
                                                        <option value="Africa/Porto-Novo">Africa/Porto-Novo</option>
                                                        <option value="Africa/Sao_Tome">Africa/Sao_Tome</option>
                                                        <option value="Africa/Tripoli">Africa/Tripoli</option>
                                                        <option value="Africa/Tunis">Africa/Tunis</option>
                                                        <option value="Africa/Windhoek">Africa/Windhoek</option>
                                                        <option value="America/Adak">America/Adak</option>
                                                        <option value="America/Anchorage">America/Anchorage</option>
                                                        <option value="America/Anguilla">America/Anguilla</option>
                                                        <option value="America/Antigua">America/Antigua</option>
                                                        <option value="America/Araguaina">America/Araguaina</option>
                                                        <option value="America/Argentina/Buenos_Aires">
                                                            America/Argentina/Buenos_Aires</option>
                                                        <option value="America/Argentina/Catamarca">
                                                            America/Argentina/Catamarca</option>
                                                        <option value="America/Argentina/Cordoba">
                                                            America/Argentina/Cordoba</option>
                                                        <option value="America/Argentina/Jujuy">America/Argentina/Jujuy
                                                        </option>
                                                        <option value="America/Argentina/La_Rioja">
                                                            America/Argentina/La_Rioja</option>
                                                        <option value="America/Argentina/Mendoza">
                                                            America/Argentina/Mendoza</option>
                                                        <option value="America/Argentina/Rio_Gallegos">
                                                            America/Argentina/Rio_Gallegos</option>
                                                        <option value="America/Argentina/Salta">America/Argentina/Salta
                                                        </option>
                                                        <option value="America/Argentina/San_Juan">
                                                            America/Argentina/San_Juan</option>
                                                        <option value="America/Argentina/San_Luis">
                                                            America/Argentina/San_Luis</option>
                                                        <option value="America/Argentina/Tucuman">
                                                            America/Argentina/Tucuman</option>
                                                        <option value="America/Argentina/Ushuaia">
                                                            America/Argentina/Ushuaia</option>
                                                        <option value="America/Aruba">America/Aruba</option>
                                                        <option value="America/Asuncion">America/Asuncion</option>
                                                        <option value="America/Atikokan">America/Atikokan</option>
                                                        <option value="America/Bahia">America/Bahia</option>
                                                        <option value="America/Bahia_Banderas">America/Bahia_Banderas
                                                        </option>
                                                        <option value="America/Barbados">America/Barbados</option>
                                                        <option value="America/Belem">America/Belem</option>
                                                        <option value="America/Belize">America/Belize</option>
                                                        <option value="America/Blanc-Sablon">America/Blanc-Sablon
                                                        </option>
                                                        <option value="America/Boa_Vista">America/Boa_Vista</option>
                                                        <option value="America/Bogota">America/Bogota</option>
                                                        <option value="America/Boise">America/Boise</option>
                                                        <option value="America/Cambridge_Bay">America/Cambridge_Bay
                                                        </option>
                                                        <option value="America/Campo_Grande">America/Campo_Grande
                                                        </option>
                                                        <option value="America/Cancun">America/Cancun</option>
                                                        <option value="America/Caracas">America/Caracas</option>
                                                        <option value="America/Cayenne">America/Cayenne</option>
                                                        <option value="America/Cayman">America/Cayman</option>
                                                        <option value="America/Chicago">America/Chicago</option>
                                                        <option value="America/Chihuahua">America/Chihuahua</option>
                                                        <option value="America/Costa_Rica">America/Costa_Rica</option>
                                                        <option value="America/Creston">America/Creston</option>
                                                        <option value="America/Cuiaba">America/Cuiaba</option>
                                                        <option value="America/Curacao">America/Curacao</option>
                                                        <option value="America/Danmarkshavn">America/Danmarkshavn
                                                        </option>
                                                        <option value="America/Dawson">America/Dawson</option>
                                                        <option value="America/Dawson_Creek">America/Dawson_Creek
                                                        </option>
                                                        <option value="America/Denver">America/Denver</option>
                                                        <option value="America/Detroit">America/Detroit</option>
                                                        <option value="America/Dominica">America/Dominica</option>
                                                        <option value="America/Edmonton">America/Edmonton</option>
                                                        <option value="America/Eirunepe">America/Eirunepe</option>
                                                        <option value="America/El_Salvador">America/El_Salvador</option>
                                                        <option value="America/Fort_Nelson">America/Fort_Nelson</option>
                                                        <option value="America/Fortaleza">America/Fortaleza</option>
                                                        <option value="America/Glace_Bay">America/Glace_Bay</option>
                                                        <option value="America/Goose_Bay">America/Goose_Bay</option>
                                                        <option value="America/Grand_Turk">America/Grand_Turk</option>
                                                        <option value="America/Grenada">America/Grenada</option>
                                                        <option value="America/Guadeloupe">America/Guadeloupe</option>
                                                        <option value="America/Guatemala">America/Guatemala</option>
                                                        <option value="America/Guayaquil">America/Guayaquil</option>
                                                        <option value="America/Guyana">America/Guyana</option>
                                                        <option value="America/Halifax">America/Halifax</option>
                                                        <option value="America/Havana">America/Havana</option>
                                                        <option value="America/Hermosillo">America/Hermosillo</option>
                                                        <option value="America/Indiana/Indianapolis">
                                                            America/Indiana/Indianapolis</option>
                                                        <option value="America/Indiana/Knox">America/Indiana/Knox
                                                        </option>
                                                        <option value="America/Indiana/Marengo">America/Indiana/Marengo
                                                        </option>
                                                        <option value="America/Indiana/Petersburg">
                                                            America/Indiana/Petersburg</option>
                                                        <option value="America/Indiana/Tell_City">
                                                            America/Indiana/Tell_City</option>
                                                        <option value="America/Indiana/Vevay">America/Indiana/Vevay
                                                        </option>
                                                        <option value="America/Indiana/Vincennes">
                                                            America/Indiana/Vincennes</option>
                                                        <option value="America/Indiana/Winamac">America/Indiana/Winamac
                                                        </option>
                                                        <option value="America/Inuvik">America/Inuvik</option>
                                                        <option value="America/Iqaluit">America/Iqaluit</option>
                                                        <option value="America/Jamaica">America/Jamaica</option>
                                                        <option value="America/Juneau">America/Juneau</option>
                                                        <option value="America/Kentucky/Louisville">
                                                            America/Kentucky/Louisville</option>
                                                        <option value="America/Kentucky/Monticello">
                                                            America/Kentucky/Monticello</option>
                                                        <option value="America/Kralendijk">America/Kralendijk</option>
                                                        <option value="America/La_Paz">America/La_Paz</option>
                                                        <option value="America/Lima">America/Lima</option>
                                                        <option value="America/Los_Angeles">America/Los_Angeles</option>
                                                        <option value="America/Lower_Princes">America/Lower_Princes
                                                        </option>
                                                        <option value="America/Maceio">America/Maceio</option>
                                                        <option value="America/Managua">America/Managua</option>
                                                        <option value="America/Manaus">America/Manaus</option>
                                                        <option value="America/Marigot">America/Marigot</option>
                                                        <option value="America/Martinique">America/Martinique</option>
                                                        <option value="America/Matamoros">America/Matamoros</option>
                                                        <option value="America/Mazatlan">America/Mazatlan</option>
                                                        <option value="America/Menominee">America/Menominee</option>
                                                        <option value="America/Merida">America/Merida</option>
                                                        <option value="America/Metlakatla">America/Metlakatla</option>
                                                        <option value="America/Mexico_City">America/Mexico_City</option>
                                                        <option value="America/Miquelon">America/Miquelon</option>
                                                        <option value="America/Moncton">America/Moncton</option>
                                                        <option value="America/Monterrey">America/Monterrey</option>
                                                        <option value="America/Montevideo">America/Montevideo</option>
                                                        <option value="America/Montserrat">America/Montserrat</option>
                                                        <option value="America/Nassau">America/Nassau</option>
                                                        <option value="America/New_York">America/New_York</option>
                                                        <option value="America/Nipigon">America/Nipigon</option>
                                                        <option value="America/Nome">America/Nome</option>
                                                        <option value="America/Noronha">America/Noronha</option>
                                                        <option value="America/North_Dakota/Beulah">
                                                            America/North_Dakota/Beulah</option>
                                                        <option value="America/North_Dakota/Center">
                                                            America/North_Dakota/Center</option>
                                                        <option value="America/North_Dakota/New_Salem">
                                                            America/North_Dakota/New_Salem</option>
                                                        <option value="America/Nuuk">America/Nuuk</option>
                                                        <option value="America/Ojinaga">America/Ojinaga</option>
                                                        <option value="America/Panama">America/Panama</option>
                                                        <option value="America/Pangnirtung">America/Pangnirtung</option>
                                                        <option value="America/Paramaribo">America/Paramaribo</option>
                                                        <option value="America/Phoenix">America/Phoenix</option>
                                                        <option value="America/Port-au-Prince">America/Port-au-Prince
                                                        </option>
                                                        <option value="America/Port_of_Spain">America/Port_of_Spain
                                                        </option>
                                                        <option value="America/Porto_Velho">America/Porto_Velho</option>
                                                        <option value="America/Puerto_Rico">America/Puerto_Rico</option>
                                                        <option value="America/Punta_Arenas">America/Punta_Arenas
                                                        </option>
                                                        <option value="America/Rainy_River">America/Rainy_River</option>
                                                        <option value="America/Rankin_Inlet">America/Rankin_Inlet
                                                        </option>
                                                        <option value="America/Recife">America/Recife</option>
                                                        <option value="America/Regina">America/Regina</option>
                                                        <option value="America/Resolute">America/Resolute</option>
                                                        <option value="America/Rio_Branco">America/Rio_Branco</option>
                                                        <option value="America/Santarem">America/Santarem</option>
                                                        <option value="America/Santiago">America/Santiago</option>
                                                        <option value="America/Santo_Domingo">America/Santo_Domingo
                                                        </option>
                                                        <option value="America/Sao_Paulo">America/Sao_Paulo</option>
                                                        <option value="America/Scoresbysund">America/Scoresbysund
                                                        </option>
                                                        <option value="America/Sitka">America/Sitka</option>
                                                        <option value="America/St_Barthelemy">America/St_Barthelemy
                                                        </option>
                                                        <option value="America/St_Johns">America/St_Johns</option>
                                                        <option value="America/St_Kitts">America/St_Kitts</option>
                                                        <option value="America/St_Lucia">America/St_Lucia</option>
                                                        <option value="America/St_Thomas">America/St_Thomas</option>
                                                        <option value="America/St_Vincent">America/St_Vincent</option>
                                                        <option value="America/Swift_Current">America/Swift_Current
                                                        </option>
                                                        <option value="America/Tegucigalpa">America/Tegucigalpa</option>
                                                        <option value="America/Thule">America/Thule</option>
                                                        <option value="America/Thunder_Bay">America/Thunder_Bay</option>
                                                        <option value="America/Tijuana">America/Tijuana</option>
                                                        <option value="America/Toronto">America/Toronto</option>
                                                        <option value="America/Tortola">America/Tortola</option>
                                                        <option value="America/Vancouver">America/Vancouver</option>
                                                        <option value="America/Whitehorse">America/Whitehorse</option>
                                                        <option value="America/Winnipeg">America/Winnipeg</option>
                                                        <option value="America/Yakutat">America/Yakutat</option>
                                                        <option value="America/Yellowknife">America/Yellowknife</option>
                                                        <option value="Antarctica/Casey">Antarctica/Casey</option>
                                                        <option value="Antarctica/Davis">Antarctica/Davis</option>
                                                        <option value="Antarctica/DumontDUrville">
                                                            Antarctica/DumontDUrville</option>
                                                        <option value="Antarctica/Macquarie">Antarctica/Macquarie
                                                        </option>
                                                        <option value="Antarctica/Mawson">Antarctica/Mawson</option>
                                                        <option value="Antarctica/McMurdo">Antarctica/McMurdo</option>
                                                        <option value="Antarctica/Palmer">Antarctica/Palmer</option>
                                                        <option value="Antarctica/Rothera">Antarctica/Rothera</option>
                                                        <option value="Antarctica/Syowa">Antarctica/Syowa</option>
                                                        <option value="Antarctica/Troll">Antarctica/Troll</option>
                                                        <option value="Antarctica/Vostok">Antarctica/Vostok</option>
                                                        <option value="Arctic/Longyearbyen">Arctic/Longyearbyen</option>
                                                        <option value="Asia/Aden">Asia/Aden</option>
                                                        <option value="Asia/Almaty">Asia/Almaty</option>
                                                        <option value="Asia/Amman">Asia/Amman</option>
                                                        <option value="Asia/Anadyr">Asia/Anadyr</option>
                                                        <option value="Asia/Aqtau">Asia/Aqtau</option>
                                                        <option value="Asia/Aqtobe">Asia/Aqtobe</option>
                                                        <option value="Asia/Ashgabat">Asia/Ashgabat</option>
                                                        <option value="Asia/Atyrau">Asia/Atyrau</option>
                                                        <option value="Asia/Baghdad">Asia/Baghdad</option>
                                                        <option value="Asia/Bahrain">Asia/Bahrain</option>
                                                        <option value="Asia/Baku">Asia/Baku</option>
                                                        <option value="Asia/Bangkok">Asia/Bangkok</option>
                                                        <option value="Asia/Barnaul">Asia/Barnaul</option>
                                                        <option value="Asia/Beirut">Asia/Beirut</option>
                                                        <option value="Asia/Bishkek">Asia/Bishkek</option>
                                                        <option value="Asia/Brunei">Asia/Brunei</option>
                                                        <option value="Asia/Chita">Asia/Chita</option>
                                                        <option value="Asia/Choibalsan">Asia/Choibalsan</option>
                                                        <option value="Asia/Colombo">Asia/Colombo</option>
                                                        <option value="Asia/Damascus">Asia/Damascus</option>
                                                        <option value="Asia/Dhaka">Asia/Dhaka</option>
                                                        <option value="Asia/Dili">Asia/Dili</option>
                                                        <option value="Asia/Dubai">Asia/Dubai</option>
                                                        <option value="Asia/Dushanbe">Asia/Dushanbe</option>
                                                        <option value="Asia/Famagusta">Asia/Famagusta</option>
                                                        <option value="Asia/Gaza">Asia/Gaza</option>
                                                        <option value="Asia/Hebron">Asia/Hebron</option>
                                                        <option value="Asia/Ho_Chi_Minh">Asia/Ho_Chi_Minh</option>
                                                        <option value="Asia/Hong_Kong">Asia/Hong_Kong</option>
                                                        <option value="Asia/Hovd">Asia/Hovd</option>
                                                        <option value="Asia/Irkutsk">Asia/Irkutsk</option>
                                                        <option value="Asia/Jakarta">Asia/Jakarta</option>
                                                        <option value="Asia/Jayapura">Asia/Jayapura</option>
                                                        <option value="Asia/Jerusalem">Asia/Jerusalem</option>
                                                        <option value="Asia/Kabul">Asia/Kabul</option>
                                                        <option value="Asia/Kamchatka">Asia/Kamchatka</option>
                                                        <option value="Asia/Karachi">Asia/Karachi</option>
                                                        <option value="Asia/Kathmandu">Asia/Kathmandu</option>
                                                        <option value="Asia/Khandyga">Asia/Khandyga</option>
                                                        <option value="Asia/Kolkata">Asia/Kolkata</option>
                                                        <option value="Asia/Krasnoyarsk">Asia/Krasnoyarsk</option>
                                                        <option value="Asia/Kuala_Lumpur">Asia/Kuala_Lumpur</option>
                                                        <option value="Asia/Kuching">Asia/Kuching</option>
                                                        <option value="Asia/Kuwait">Asia/Kuwait</option>
                                                        <option value="Asia/Macau">Asia/Macau</option>
                                                        <option value="Asia/Magadan">Asia/Magadan</option>
                                                        <option value="Asia/Makassar">Asia/Makassar</option>
                                                        <option value="Asia/Manila">Asia/Manila</option>
                                                        <option value="Asia/Muscat">Asia/Muscat</option>
                                                        <option value="Asia/Nicosia">Asia/Nicosia</option>
                                                        <option value="Asia/Novokuznetsk">Asia/Novokuznetsk</option>
                                                        <option value="Asia/Novosibirsk">Asia/Novosibirsk</option>
                                                        <option value="Asia/Omsk">Asia/Omsk</option>
                                                        <option value="Asia/Oral">Asia/Oral</option>
                                                        <option value="Asia/Phnom_Penh">Asia/Phnom_Penh</option>
                                                        <option value="Asia/Pontianak">Asia/Pontianak</option>
                                                        <option value="Asia/Pyongyang">Asia/Pyongyang</option>
                                                        <option value="Asia/Qatar">Asia/Qatar</option>
                                                        <option value="Asia/Qostanay">Asia/Qostanay</option>
                                                        <option value="Asia/Qyzylorda">Asia/Qyzylorda</option>
                                                        <option value="Asia/Riyadh">Asia/Riyadh</option>
                                                        <option value="Asia/Sakhalin">Asia/Sakhalin</option>
                                                        <option value="Asia/Samarkand">Asia/Samarkand</option>
                                                        <option value="Asia/Seoul">Asia/Seoul</option>
                                                        <option value="Asia/Shanghai">Asia/Shanghai</option>
                                                        <option value="Asia/Singapore">Asia/Singapore</option>
                                                        <option value="Asia/Srednekolymsk">Asia/Srednekolymsk</option>
                                                        <option value="Asia/Taipei">Asia/Taipei</option>
                                                        <option value="Asia/Tashkent">Asia/Tashkent</option>
                                                        <option value="Asia/Tbilisi">Asia/Tbilisi</option>
                                                        <option value="Asia/Tehran">Asia/Tehran</option>
                                                        <option value="Asia/Thimphu">Asia/Thimphu</option>
                                                        <option value="Asia/Tokyo">Asia/Tokyo</option>
                                                        <option value="Asia/Tomsk">Asia/Tomsk</option>
                                                        <option value="Asia/Ulaanbaatar">Asia/Ulaanbaatar</option>
                                                        <option value="Asia/Urumqi">Asia/Urumqi</option>
                                                        <option value="Asia/Ust-Nera">Asia/Ust-Nera</option>
                                                        <option value="Asia/Vientiane">Asia/Vientiane</option>
                                                        <option value="Asia/Vladivostok">Asia/Vladivostok</option>
                                                        <option value="Asia/Yakutsk">Asia/Yakutsk</option>
                                                        <option value="Asia/Yangon">Asia/Yangon</option>
                                                        <option value="Asia/Yekaterinburg">Asia/Yekaterinburg</option>
                                                        <option value="Asia/Yerevan">Asia/Yerevan</option>
                                                        <option value="Atlantic/Azores">Atlantic/Azores</option>
                                                        <option value="Atlantic/Bermuda">Atlantic/Bermuda</option>
                                                        <option value="Atlantic/Canary">Atlantic/Canary</option>
                                                        <option value="Atlantic/Cape_Verde">Atlantic/Cape_Verde</option>
                                                        <option value="Atlantic/Faroe">Atlantic/Faroe</option>
                                                        <option value="Atlantic/Madeira">Atlantic/Madeira</option>
                                                        <option value="Atlantic/Reykjavik">Atlantic/Reykjavik</option>
                                                        <option value="Atlantic/South_Georgia">Atlantic/South_Georgia
                                                        </option>
                                                        <option value="Atlantic/St_Helena">Atlantic/St_Helena</option>
                                                        <option value="Atlantic/Stanley">Atlantic/Stanley</option>
                                                        <option value="Australia/Adelaide">Australia/Adelaide</option>
                                                        <option value="Australia/Brisbane">Australia/Brisbane</option>
                                                        <option value="Australia/Broken_Hill">Australia/Broken_Hill
                                                        </option>
                                                        <option value="Australia/Darwin">Australia/Darwin</option>
                                                        <option value="Australia/Eucla">Australia/Eucla</option>
                                                        <option value="Australia/Hobart">Australia/Hobart</option>
                                                        <option value="Australia/Lindeman">Australia/Lindeman</option>
                                                        <option value="Australia/Lord_Howe">Australia/Lord_Howe</option>
                                                        <option value="Australia/Melbourne">Australia/Melbourne</option>
                                                        <option value="Australia/Perth">Australia/Perth</option>
                                                        <option value="Australia/Sydney">Australia/Sydney</option>
                                                        <option value="Europe/Amsterdam">Europe/Amsterdam</option>
                                                        <option value="Europe/Andorra">Europe/Andorra</option>
                                                        <option value="Europe/Astrakhan">Europe/Astrakhan</option>
                                                        <option value="Europe/Athens">Europe/Athens</option>
                                                        <option value="Europe/Belgrade">Europe/Belgrade</option>
                                                        <option value="Europe/Berlin">Europe/Berlin</option>
                                                        <option value="Europe/Bratislava">Europe/Bratislava</option>
                                                        <option value="Europe/Brussels">Europe/Brussels</option>
                                                        <option value="Europe/Bucharest">Europe/Bucharest</option>
                                                        <option value="Europe/Budapest">Europe/Budapest</option>
                                                        <option value="Europe/Busingen">Europe/Busingen</option>
                                                        <option value="Europe/Chisinau">Europe/Chisinau</option>
                                                        <option value="Europe/Copenhagen">Europe/Copenhagen</option>
                                                        <option value="Europe/Dublin">Europe/Dublin</option>
                                                        <option value="Europe/Gibraltar">Europe/Gibraltar</option>
                                                        <option value="Europe/Guernsey">Europe/Guernsey</option>
                                                        <option value="Europe/Helsinki">Europe/Helsinki</option>
                                                        <option value="Europe/Isle_of_Man">Europe/Isle_of_Man</option>
                                                        <option value="Europe/Istanbul">Europe/Istanbul</option>
                                                        <option value="Europe/Jersey">Europe/Jersey</option>
                                                        <option value="Europe/Kaliningrad">Europe/Kaliningrad</option>
                                                        <option value="Europe/Kiev">Europe/Kiev</option>
                                                        <option value="Europe/Kirov">Europe/Kirov</option>
                                                        <option value="Europe/Lisbon">Europe/Lisbon</option>
                                                        <option value="Europe/Ljubljana">Europe/Ljubljana</option>
                                                        <option value="Europe/London">Europe/London</option>
                                                        <option value="Europe/Luxembourg">Europe/Luxembourg</option>
                                                        <option value="Europe/Madrid">Europe/Madrid</option>
                                                        <option value="Europe/Malta">Europe/Malta</option>
                                                        <option value="Europe/Mariehamn">Europe/Mariehamn</option>
                                                        <option value="Europe/Minsk">Europe/Minsk</option>
                                                        <option value="Europe/Monaco">Europe/Monaco</option>
                                                        <option value="Europe/Moscow">Europe/Moscow</option>
                                                        <option value="Europe/Oslo">Europe/Oslo</option>
                                                        <option value="Europe/Paris">Europe/Paris</option>
                                                        <option value="Europe/Podgorica">Europe/Podgorica</option>
                                                        <option value="Europe/Prague">Europe/Prague</option>
                                                        <option value="Europe/Riga">Europe/Riga</option>
                                                        <option value="Europe/Rome">Europe/Rome</option>
                                                        <option value="Europe/Samara">Europe/Samara</option>
                                                        <option value="Europe/San_Marino">Europe/San_Marino</option>
                                                        <option value="Europe/Sarajevo">Europe/Sarajevo</option>
                                                        <option value="Europe/Saratov">Europe/Saratov</option>
                                                        <option value="Europe/Simferopol">Europe/Simferopol</option>
                                                        <option value="Europe/Skopje">Europe/Skopje</option>
                                                        <option value="Europe/Sofia">Europe/Sofia</option>
                                                        <option value="Europe/Stockholm">Europe/Stockholm</option>
                                                        <option value="Europe/Tallinn">Europe/Tallinn</option>
                                                        <option value="Europe/Tirane">Europe/Tirane</option>
                                                        <option value="Europe/Ulyanovsk">Europe/Ulyanovsk</option>
                                                        <option value="Europe/Uzhgorod">Europe/Uzhgorod</option>
                                                        <option value="Europe/Vaduz">Europe/Vaduz</option>
                                                        <option value="Europe/Vatican">Europe/Vatican</option>
                                                        <option value="Europe/Vienna">Europe/Vienna</option>
                                                        <option value="Europe/Vilnius">Europe/Vilnius</option>
                                                        <option value="Europe/Volgograd">Europe/Volgograd</option>
                                                        <option value="Europe/Warsaw">Europe/Warsaw</option>
                                                        <option value="Europe/Zagreb">Europe/Zagreb</option>
                                                        <option value="Europe/Zaporozhye">Europe/Zaporozhye</option>
                                                        <option value="Europe/Zurich">Europe/Zurich</option>
                                                        <option value="Indian/Antananarivo">Indian/Antananarivo</option>
                                                        <option value="Indian/Chagos">Indian/Chagos</option>
                                                        <option value="Indian/Christmas">Indian/Christmas</option>
                                                        <option value="Indian/Cocos">Indian/Cocos</option>
                                                        <option value="Indian/Comoro">Indian/Comoro</option>
                                                        <option value="Indian/Kerguelen">Indian/Kerguelen</option>
                                                        <option value="Indian/Mahe">Indian/Mahe</option>
                                                        <option value="Indian/Maldives">Indian/Maldives</option>
                                                        <option value="Indian/Mauritius">Indian/Mauritius</option>
                                                        <option value="Indian/Mayotte">Indian/Mayotte</option>
                                                        <option value="Indian/Reunion">Indian/Reunion</option>
                                                        <option value="Pacific/Apia">Pacific/Apia</option>
                                                        <option value="Pacific/Auckland">Pacific/Auckland</option>
                                                        <option value="Pacific/Bougainville">Pacific/Bougainville
                                                        </option>
                                                        <option value="Pacific/Chatham">Pacific/Chatham</option>
                                                        <option value="Pacific/Chuuk">Pacific/Chuuk</option>
                                                        <option value="Pacific/Easter">Pacific/Easter</option>
                                                        <option value="Pacific/Efate">Pacific/Efate</option>
                                                        <option value="Pacific/Fakaofo">Pacific/Fakaofo</option>
                                                        <option value="Pacific/Fiji">Pacific/Fiji</option>
                                                        <option value="Pacific/Funafuti">Pacific/Funafuti</option>
                                                        <option value="Pacific/Galapagos">Pacific/Galapagos</option>
                                                        <option value="Pacific/Gambier">Pacific/Gambier</option>
                                                        <option value="Pacific/Guadalcanal">Pacific/Guadalcanal</option>
                                                        <option value="Pacific/Guam">Pacific/Guam</option>
                                                        <option value="Pacific/Honolulu">Pacific/Honolulu</option>
                                                        <option value="Pacific/Kanton">Pacific/Kanton</option>
                                                        <option value="Pacific/Kiritimati">Pacific/Kiritimati</option>
                                                        <option value="Pacific/Kosrae">Pacific/Kosrae</option>
                                                        <option value="Pacific/Kwajalein">Pacific/Kwajalein</option>
                                                        <option value="Pacific/Majuro">Pacific/Majuro</option>
                                                        <option value="Pacific/Marquesas">Pacific/Marquesas</option>
                                                        <option value="Pacific/Midway">Pacific/Midway</option>
                                                        <option value="Pacific/Nauru">Pacific/Nauru</option>
                                                        <option value="Pacific/Niue">Pacific/Niue</option>
                                                        <option value="Pacific/Norfolk">Pacific/Norfolk</option>
                                                        <option value="Pacific/Noumea">Pacific/Noumea</option>
                                                        <option value="Pacific/Pago_Pago">Pacific/Pago_Pago</option>
                                                        <option value="Pacific/Palau">Pacific/Palau</option>
                                                        <option value="Pacific/Pitcairn">Pacific/Pitcairn</option>
                                                        <option value="Pacific/Pohnpei">Pacific/Pohnpei</option>
                                                        <option value="Pacific/Port_Moresby">Pacific/Port_Moresby
                                                        </option>
                                                        <option value="Pacific/Rarotonga">Pacific/Rarotonga</option>
                                                        <option value="Pacific/Saipan">Pacific/Saipan</option>
                                                        <option value="Pacific/Tahiti">Pacific/Tahiti</option>
                                                        <option value="Pacific/Tarawa">Pacific/Tarawa</option>
                                                        <option value="Pacific/Tongatapu">Pacific/Tongatapu</option>
                                                        <option value="Pacific/Wake">Pacific/Wake</option>
                                                        <option value="Pacific/Wallis">Pacific/Wallis</option>
                                                        <option value="UTC">UTC</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <h5 class="text-dark">Logo (Recommended size; max width, 200px and
                                                        max height 100px.)</h5>
                                                    <input name="logo" class="form-control bg-light text-dark"
                                                        type="file">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <h5 class="text-dark">Favicon (Recommended type: png, size: max
                                                        width, 32px and max height 32px.)</h5>
                                                    <input name="favicon" class="form-control bg-light text-dark"
                                                        type="file">
                                                </div>
                                            </div>

                                            <div class="mt-3 form-row">
                                                <input type="submit" class="px-5 btn btn-primary btn-lg" value="Update">
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pref">
                                <div class="row">
                                    <div class="col-12">
                                        <form method="POST" action="{{route('update.preferences')}}"
                                            enctype="multipart/form-data">
                                            {{ csrf_field()}}
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <h5 class="text-dark">Contact Email</h5>
                                                    <input type="text" class="form-control bg-light text-dark"
                                                        name="contact_email" value="{{$preference->contact_email}}"
                                                        required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <h5 class="text-dark">Uploaded Files Location</h5>
                                                    <select name="file_location"
                                                        class="form-control bg-light text-dark">
                                                        <option>Local</option>
                                                        <option>AWS S3</option>
                                                        <option>Email</option>
                                                        <option>Local</option>
                                                    </select>
                                                    <small class="text-dark">Note: To use AWS S3, please supply your AWS
                                                        information in the .ENV file</small>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <h5 class="text-dark">Website Currency</h5>
                                                    <select name="currency" id="select_c"
                                                        class="form-control bg-light text-dark select2"
                                                        onchange="changecurr()" style="width: 100%">
                                                        <option value="{{$preference->contact_email}}" selected>
                                                            {{$preference->contact_email}}</option>
                                                        <option id="AED" value="د.إ">AED (د.إ)</option>
                                                        <option id="AFN" value="Af">AFN (Af)</option>
                                                        <option id="ALL" value="Lek">ALL (Lek)</option>
                                                        <option id="ANG" value="ƒ">ANG (ƒ)</option>
                                                        <option id="AOA" value="Kz">AOA (Kz)</option>
                                                        <option id="ARS" value="$">ARS ($)</option>
                                                        <option id="AUD" value="$">AUD ($)</option>
                                                        <option id="AWG" value="ƒ">AWG (ƒ)</option>
                                                        <option id="AZN" value="ман">AZN (ман)</option>
                                                        <option id="BAM" value="KM">BAM (KM)</option>
                                                        <option id="BBD" value="$">BBD ($)</option>
                                                        <option id="BDT" value="৳">BDT (৳)</option>
                                                        <option id="BGN" value="лв">BGN (лв)</option>
                                                        <option id="BHD" value=".د.ب">BHD (.د.ب)</option>
                                                        <option id="BIF" value="FBu">BIF (FBu)</option>
                                                        <option id="BMD" value="$">BMD ($)</option>
                                                        <option id="BND" value="$">BND ($)</option>
                                                        <option id="BOB" value="$b">BOB ($b)</option>
                                                        <option id="BRL" value="R$">BRL (R$)</option>
                                                        <option id="BTC" value="BTC">BTC (BTC)</option>
                                                        <option id="BSD" value="$">BSD ($)</option>
                                                        <option id="BTN" value="Nu.">BTN (Nu.)</option>
                                                        <option id="BWP" value="P">BWP (P)</option>
                                                        <option id="BYR" value="p.">BYR (p.)</option>
                                                        <option id="BZD" value="BZ$">BZD (BZ$)</option>
                                                        <option id="CAD" value="$">CAD ($)</option>
                                                        <option id="CDF" value="FC">CDF (FC)</option>
                                                        <option id="CHF" value="CHF">CHF (CHF)</option>
                                                        <option id="CLP" value="$">CLP ($)</option>
                                                        <option id="CNY" value="¥">CNY (¥)</option>
                                                        <option id="COP" value="$">COP ($)</option>
                                                        <option id="CRC" value="₡">CRC (₡)</option>
                                                        <option id="CUP" value="⃌">CUP (⃌)</option>
                                                        <option id="CVE" value="$">CVE ($)</option>
                                                        <option id="CZK" value="Kč">CZK (Kč)</option>
                                                        <option id="DJF" value="Fdj">DJF (Fdj)</option>
                                                        <option id="DKK" value="kr">DKK (kr)</option>
                                                        <option id="DOP" value="RD$">DOP (RD$)</option>
                                                        <option id="DZD" value="دج">DZD (دج)</option>
                                                        <option id="EGP" value="£">EGP (£)</option>
                                                        <option id="ETB" value="Br">ETB (Br)</option>
                                                        <option id="EUR" value="€">EUR (€)</option>
                                                        <option id="ETH" value="ETH">ETH (ETH)</option>
                                                        <option id="FJD" value="$">FJD ($)</option>
                                                        <option id="FKP" value="£">FKP (£)</option>
                                                        <option id="GBP" value="£">GBP (£)</option>
                                                        <option id="GEL" value="ლ">GEL (ლ)</option>
                                                        <option id="GHS" value="¢">GHS (¢)</option>
                                                        <option id="GIP" value="£">GIP (£)</option>
                                                        <option id="GMD" value="D">GMD (D)</option>
                                                        <option id="GNF" value="FG">GNF (FG)</option>
                                                        <option id="GTQ" value="Q">GTQ (Q)</option>
                                                        <option id="GYD" value="$">GYD ($)</option>
                                                        <option id="HKD" value="$">HKD ($)</option>
                                                        <option id="HNL" value="L">HNL (L)</option>
                                                        <option id="HRK" value="kn">HRK (kn)</option>
                                                        <option id="HTG" value="G">HTG (G)</option>
                                                        <option id="HUF" value="Ft">HUF (Ft)</option>
                                                        <option id="IDR" value="Rp">IDR (Rp)</option>
                                                        <option id="ILS" value="₪">ILS (₪)</option>
                                                        <option id="INR" value="₹">INR (₹)</option>
                                                        <option id="IQD" value="ع.د">IQD (ع.د)</option>
                                                        <option id="IRR" value="﷼">IRR (﷼)</option>
                                                        <option id="ISK" value="kr">ISK (kr)</option>
                                                        <option id="JEP" value="£">JEP (£)</option>
                                                        <option id="JMD" value="J$">JMD (J$)</option>
                                                        <option id="JOD" value="JD">JOD (JD)</option>
                                                        <option id="JPY" value="¥">JPY (¥)</option>
                                                        <option id="KES" value="KSh">KES (KSh)</option>
                                                        <option id="KGS" value="лв">KGS (лв)</option>
                                                        <option id="KHR" value="៛">KHR (៛)</option>
                                                        <option id="KMF" value="CF">KMF (CF)</option>
                                                        <option id="KPW" value="₩">KPW (₩)</option>
                                                        <option id="KRW" value="₩">KRW (₩)</option>
                                                        <option id="KWD" value="د.ك">KWD (د.ك)</option>
                                                        <option id="KYD" value="$">KYD ($)</option>
                                                        <option id="KZT" value="лв">KZT (лв)</option>
                                                        <option id="LAK" value="₭">LAK (₭)</option>
                                                        <option id="LBP" value="£">LBP (£)</option>
                                                        <option id="LKR" value="₨">LKR (₨)</option>
                                                        <option id="LRD" value="$">LRD ($)</option>
                                                        <option id="LSL" value="L">LSL (L)</option>
                                                        <option id="LTL" value="Lt">LTL (Lt)</option>
                                                        <option id="LVL" value="Ls">LVL (Ls)</option>
                                                        <option id="LYD" value="ل.د">LYD (ل.د)</option>
                                                        <option id="MAD" value="د.م.">MAD (د.م.)</option>
                                                        <option id="MDL" value="L">MDL (L)</option>
                                                        <option id="MGA" value="Ar">MGA (Ar)</option>
                                                        <option id="MKD" value="ден">MKD (ден)</option>
                                                        <option id="MMK" value="K">MMK (K)</option>
                                                        <option id="MNT" value="₮">MNT (₮)</option>
                                                        <option id="MOP" value="MOP$">MOP (MOP$)</option>
                                                        <option id="MRO" value="UM">MRO (UM)</option>
                                                        <option id="MUR" value="₨">MUR (₨)</option>
                                                        <option id="MVR" value=".ރ">MVR (.ރ)</option>
                                                        <option id="MWK" value="MK">MWK (MK)</option>
                                                        <option id="MXN" value="$">MXN ($)</option>
                                                        <option id="MYR" value="RM">MYR (RM)</option>
                                                        <option id="MZN" value="MT">MZN (MT)</option>
                                                        <option id="NAD" value="$">NAD ($)</option>
                                                        <option id="NGN" value="₦">NGN (₦)</option>
                                                        <option id="NIO" value="C$">NIO (C$)</option>
                                                        <option id="NOK" value="kr">NOK (kr)</option>
                                                        <option id="NPR" value="₨">NPR (₨)</option>
                                                        <option id="NZD" value="$">NZD ($)</option>
                                                        <option id="OMR" value="﷼">OMR (﷼)</option>
                                                        <option id="PAB" value="B/.">PAB (B/.)</option>
                                                        <option id="PEN" value="S/.">PEN (S/.)</option>
                                                        <option id="PGK" value="K">PGK (K)</option>
                                                        <option id="PHP" value="₱">PHP (₱)</option>
                                                        <option id="PKR" value="₨">PKR (₨)</option>
                                                        <option id="PLN" value="zł">PLN (zł)</option>
                                                        <option id="PYG" value="Gs">PYG (Gs)</option>
                                                        <option id="QAR" value="﷼">QAR (﷼)</option>
                                                        <option id="RON" value="lei">RON (lei)</option>
                                                        <option id="RSD" value="Дин.">RSD (Дин.)</option>
                                                        <option id="RUB" value="руб">RUB (руб)</option>
                                                        <option id="RWF" value="ر.س">RWF (ر.س)</option>
                                                        <option id="SAR" value="﷼">SAR (﷼)</option>
                                                        <option id="SBD" value="$">SBD ($)</option>
                                                        <option id="SCR" value="₨">SCR (₨)</option>
                                                        <option id="SDG" value="£">SDG (£)</option>
                                                        <option id="SEK" value="kr">SEK (kr)</option>
                                                        <option id="SGD" value="$">SGD ($)</option>
                                                        <option id="SHP" value="£">SHP (£)</option>
                                                        <option id="SLL" value="Le">SLL (Le)</option>
                                                        <option id="SOS" value="S">SOS (S)</option>
                                                        <option id="SRD" value="$">SRD ($)</option>
                                                        <option id="STD" value="Db">STD (Db)</option>
                                                        <option id="SVC" value="$">SVC ($)</option>
                                                        <option id="SYP" value="£">SYP (£)</option>
                                                        <option id="SZL" value="L">SZL (L)</option>
                                                        <option id="THB" value="฿">THB (฿)</option>
                                                        <option id="TJS" value="TJS">TJS (TJS)</option>
                                                        <option id="TMT" value="m">TMT (m)</option>
                                                        <option id="TND" value="د.ت">TND (د.ت)</option>
                                                        <option id="TOP" value="T$">TOP (T$)</option>
                                                        <option id="TRY" value="₤">TRY (₤)</option>
                                                        <option id="TTD" value="$">TTD ($)</option>
                                                        <option id="TWD" value="NT$">TWD (NT$)</option>
                                                        <option id="UAH" value="₴">UAH (₴)</option>
                                                        <option id="UGX" value="USh">UGX (USh)</option>
                                                        <option id="USD" value="$">USD ($)</option>
                                                        <option id="UYU" value="$U">UYU ($U)</option>
                                                        <option id="UZS" value="лв">UZS (лв)</option>
                                                        <option id="VEF" value="Bs">VEF (Bs)</option>
                                                        <option id="VND" value="₫">VND (₫)</option>
                                                        <option id="VUV" value="VT">VUV (VT)</option>
                                                        <option id="WST" value="WS$">WST (WS$)</option>
                                                        <option id="XAF" value="FCFA">XAF (FCFA)</option>
                                                        <option id="XCD" value="$">XCD ($)</option>
                                                        <option id="XPF" value="F">XPF (F)</option>
                                                        <option id="YER" value="﷼">YER (﷼)</option>
                                                        <option id="ZAR" value="R">ZAR (R)</option>
                                                        <option id="ZMK" value="ZK">ZMK (ZK)</option>
                                                        <option id="ZWL" value="Z$">ZWL (Z$)</option>
                                                    </select>

                                                </div>

                                            </div>

                                            <div class="mt-3 row">
                                                <div class="mt-4 col-md-6">
                                                    <h5 class="text-dark">Annoucment:</h5>
                                                    <div class="selectgroup">
                                                        <label class="selectgroup-item">
                                                            <input type="radio" name="announcement" id="annouc"
                                                                value="on" class="selectgroup-input"
                                                                {{$preference->announcement=='on'?'checked':''}}>
                                                            <span class="selectgroup-button">On</span>
                                                        </label>
                                                        <label class="selectgroup-item">
                                                            <input type="radio" name="annoucement" id="annoucoff"
                                                                value="off" class="selectgroup-input"
                                                                {{$preference->announcement=='off'?'checked':''}}>
                                                            <span class="selectgroup-button">Off</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="mt-4 col-md-6">
                                                    <h5 class="text-dark">Weekend Trade:</h5>
                                                    <div class="selectgroup">
                                                        <label class="selectgroup-item">
                                                            <input type="radio" name="weekend_trade" id="weekend_trade"
                                                                value="on" class="selectgroup-input">
                                                            <span class="selectgroup-button">On</span>
                                                        </label>
                                                        <label class="selectgroup-item">
                                                            <input type="radio" name="weekend_trade"
                                                                id="weekend_tradeoff" value="off"
                                                                class="selectgroup-input">
                                                            <span class="selectgroup-button">Off</span>
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <small class="text-dark">if turned off, Users will not receive
                                                            ROI on weekends</small>
                                                    </div>
                                                </div>

                                                <div class="mt-4 col-md-6">
                                                    <h5 class="text-dark">Withdrawals</h5>
                                                    <div class="selectgroup">
                                                        <label class="selectgroup-item">
                                                            <input type="radio" name="withdrawals" id="withdraw"
                                                                value="true" class="selectgroup-input">
                                                            <span class="selectgroup-button">Enable</span>
                                                        </label>
                                                        <label class="selectgroup-item">
                                                            <input type="radio" name="withdrawals" id="withdrawoff"
                                                                value="false" class="selectgroup-input">
                                                            <span class="selectgroup-button">Disable</span>
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <small class="text-dark">if disabled, Users will not be able to
                                                            place withdrawal request</small>
                                                    </div>

                                                </div>

                                                <div class="mt-4 col-md-6">
                                                    <h5 class="text-dark">Google ReCaptcha:</h5>
                                                    <div class="selectgroup">
                                                        <label class="selectgroup-item">
                                                            <input type="radio" name="google_re" id="captcha"
                                                                value="true" class="selectgroup-input" checked="">
                                                            <span class="selectgroup-button">On</span>
                                                        </label>
                                                        <label class="selectgroup-item">
                                                            <input type="radio" name="google_re" id="captchaoff"
                                                                value="false" class="selectgroup-input">
                                                            <span class="selectgroup-button">Off</span>
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <small class="text-dark">if turned on, Users will need to pass
                                                            the google recaptcha challenge upon registration, also
                                                            please see how to set up google recpatcha on your website
                                                            before you can use it. <a
                                                                href="https://doc.onlinetrade.brynamics.xyz/details/how-to-add-google-recaptcha-"
                                                                target="_blank">See how</a></small>
                                                    </div>

                                                </div>

                                                <div class="mt-4 col-md-6">
                                                    <h5 class="text-dark">Translation</h5>
                                                    <div class="selectgroup">
                                                        <label class="selectgroup-item">
                                                            <input type="radio" name="translation" id="googlet"
                                                                value="on" class="selectgroup-input" checked="">
                                                            <span class="selectgroup-button">On</span>
                                                        </label>
                                                        <label class="selectgroup-item">
                                                            <input type="radio" name="translation" id="googletoff"
                                                                value="off" class="selectgroup-input">
                                                            <span class="selectgroup-button">Off</span>
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <small class="text-dark">if turned on, Users will have the
                                                            option of selecting their preferred language through google
                                                            translation</small>
                                                    </div>
                                                </div>

                                                <div class="mt-4 col-md-6">
                                                    <h5 class="text-dark">Trade Mode</h5>
                                                    <div class="selectgroup">
                                                        <label class="selectgroup-item">
                                                            <input type="radio" name="trade_mode" id="trade_mode"
                                                                value="on" class="selectgroup-input" checked="">
                                                            <span class="selectgroup-button">On</span>
                                                        </label>
                                                        <label class="selectgroup-item">
                                                            <input type="radio" name="trade_mode" id="trade_modeoff"
                                                                value="off" class="selectgroup-input">
                                                            <span class="selectgroup-button">Off</span>
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <small class="text-dark">if turned off, Users will not receive
                                                            thier ROI at all.</small>
                                                    </div>
                                                </div>

                                                <div class="mt-4 col-md-6">
                                                    <h5 class="text-dark">KYC(Verification)</h5>
                                                    <div class="selectgroup">
                                                        <label class="selectgroup-item">
                                                            <input type="radio" name="kyc" id="enable_kyc" value="yes"
                                                                class="selectgroup-input" checked="">
                                                            <span class="selectgroup-button">On</span>
                                                        </label>
                                                        <label class="selectgroup-item">
                                                            <input type="radio" name="kyc" id="enable_kycoff" value="no"
                                                                class="selectgroup-input">
                                                            <span class="selectgroup-button">Off</span>
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <small class="text-dark">if turned on, Users will need to submit
                                                            required documents to get verified before they can place a
                                                            withdrawal request.</small>
                                                    </div>
                                                </div>

                                                <div class="mt-4 col-md-6">
                                                    <h5 class="text-dark">Google Login</h5>
                                                    <div class="selectgroup">
                                                        <label class="selectgroup-item">
                                                            <input type="radio" name="google_login" id="social"
                                                                value="yes" class="selectgroup-input" checked="">
                                                            <span class="selectgroup-button">On</span>
                                                        </label>
                                                        <label class="selectgroup-item">
                                                            <input type="radio" name="google_login" id="socialoff"
                                                                value="no" class="selectgroup-input">
                                                            <span class="selectgroup-button">Off</span>
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <small class="text-dark">Google Login allows users to
                                                            login/register with their google account</small>
                                                    </div>
                                                </div>

                                                <div class="mt-4 col-md-6">
                                                    <h5 class="text-dark">Email Verification</h5>
                                                    <div class="selectgroup">
                                                        <label class="selectgroup-item">
                                                            <input type="radio" name="email_verification"
                                                                id="enail_verify" value="true" class="selectgroup-input"
                                                                checked="">
                                                            <span class="selectgroup-button">Enable</span>
                                                        </label>
                                                        <label class="selectgroup-item">
                                                            <input type="radio" name="email_verification"
                                                                id="enail_verifyoff" value="false"
                                                                class="selectgroup-input">
                                                            <span class="selectgroup-button">Disable</span>
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <small class="text-dark">If email verification is disabled users
                                                            will not be ask to verify their email address.</small>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="id" value="1">
                                            </div>
                                            <div class="mt-4">
                                                <input type="submit" class="px-5 btn btn-primary btn-lg" value="Save">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <script>
                                    document.getElementById("annouc").checked= true;
                                </script>

                                <script>
                                    document.getElementById("enail_verifyoff").checked= true;
                                </script>

                                <script>
                                    document.getElementById("googlet").checked= true;
                                </script>

                                <script>
                                    document.getElementById("trade_mode").checked= true;
                                </script>

                                <script>
                                    document.getElementById("enable_kyc").checked= true;
                                </script>

                                <script>
                                    document.getElementById("weekend_trade").checked= true;
                                </script>

                                <script>
                                    document.getElementById("withdraw").checked= true;
                                </script>

                                <script>
                                    document.getElementById("captchaoff").checked= true;
                                </script>
                                <script>
                                    document.getElementById("social").checked= true;
                                </script>
                            </div>
                            <div class="tab-pane fade" id="email">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4>Configuration</h4>
                                        <hr>
                                    </div>
                                    <div class="col-md-12">
                                        <form method="POST" action="{{route('update.smtp')}}"
                                            enctype="multipart/form-data">
                                            {{ csrf_field()}}
                                            <div class=" form-row">
                                                <div class="form-group col-md-12">
                                                    <div class="">
                                                        <h5 class="text-dark">Mail Server</h5>
                                                        <div class="selectgroup">
                                                            <label class="selectgroup-item">
                                                                <input type="radio" name="email_serve"
                                                                    id="sendmailserver" value="{{$smtp->email_serve}}"
                                                                    class="selectgroup-input" checked="">
                                                                <span class="selectgroup-button">Sendmail</span>
                                                            </label>
                                                            <label class="selectgroup-item">
                                                                <input type="radio" name="email_server" id="smtpserver"
                                                                    value="smtp" class="selectgroup-input">
                                                                <span class="selectgroup-button">SMTP</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <h5 class="text-dark">Email From</h5>
                                                    <input type="email" name="email_from"
                                                        class="form-control bg-light text-dark"
                                                        value="{{$smtp->email_from}}" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <h5 class="text-dark">Email From Name</h5>
                                                    <input type="text" name="email_from_name"
                                                        class="form-control bg-light text-dark"
                                                        value="{{$smtp->email_from_name}}" required>
                                                </div>
                                                <div class="form-group col-md-6 smtp d-none">
                                                    <h5 class="text-dark">SMTP Host</h5>
                                                    <input type="text" name="host"
                                                        class="form-control bg-light text-dark smtpinput"
                                                        value="{{$smtp->host}}">
                                                </div>
                                                <div class="form-group col-md-6 smtp d-none">
                                                    <h5 class="text-dark">SMPT Port</h5>
                                                    <input type="text" name="port"
                                                        class="form-control bg-light text-dark smtpinput"
                                                        value="{{$smtp->port}}">
                                                </div>
                                                <div class="form-group col-md-6 smtp d-none">
                                                    <h5 class="text-dark">SMPT Encryption</h5>
                                                    <input type="text" name="encryption"
                                                        class="form-control bg-light text-dark smtpinput"
                                                        value="{{$smtp->encryption}}">
                                                </div>
                                                <div class="form-group col-md-6 smtp d-none">
                                                    <h5 class="text-dark">SMPT Username</h5>
                                                    <input type="text" name="username"
                                                        class="form-control bg-light text-dark smtpinput"
                                                        value="{{$smtp->username}}">
                                                </div>
                                                <div class="form-group col-md-6 smtp d-none">
                                                    <h5 class="text-dark">SMPT Password</h5>
                                                    <input type="text" name="password"
                                                        class="form-control bg-light text-dark smtpinput"
                                                        value="{{$smtp->password}}">
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <h4>Google Login Credentials</h4>
                                                    <hr>
                                                </div>
                                            </div>
                                            <div class=" form-row">
                                                <div class="form-group col-md-6">
                                                    <h5 class="text-dark">Client ID</h5>
                                                    <input type="text" name="client_id"
                                                        class="form-control bg-light text-dark"
                                                        value="{{$smtp->client_id}}">
                                                    <small class="text-dark"> From console.cloud.google.com</small>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <h5 class="text-dark">Client Secret</h5>
                                                    <input type="text" name="client_secret"
                                                        class="form-control bg-light text-dark"
                                                        value="{{$smtp->client_secret}}">
                                                    <small class="text-dark"> From console.cloud.google.com</small>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <h5 class="text-dark">Redirect URL</h5>
                                                    <input type="text" name="url"
                                                        class="form-control bg-light text-dark" value="{{$smtp->url}}">
                                                    <small class="text-dark">Set this to your Valid OAuth Redirect URI
                                                        in console.cloud.google.com. Be sure to replace the
                                                        'yoursite.com' with your website url </small>
                                                </div>
                                            </div>
                                            <div class="mt-4 form-row">
                                                <div class="col-md-12">
                                                    <h4>Google Captcha Credentials</h4>
                                                    <hr>
                                                </div>
                                            </div>
                                            <div class=" form-row">
                                                <div class="form-group col-md-6">
                                                    <h5 class="text-dark">Captcha Secret</h5>
                                                    <input type="text" name="secret"
                                                        class="form-control bg-light text-dark" value="{{$smtp->key}}">
                                                    <small class="text-dark"> From
                                                        https://www.google.com/recaptcha/admin/create </small>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <h5 class="text-dark">Captcha Site-Key</h5>
                                                    <input type="text" name="key"
                                                        class="form-control bg-light text-dark" value="{{$smtp->key}}">
                                                    <small class="text-dark"> From
                                                        https://www.google.com/recaptcha/admin/create</small>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <input type="submit" class="px-5 btn btn-primary btn-lg"
                                                        value="Save">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>


                                <script>
                                    document.getElementById("smtpserver").checked= true;
                                </script>
                            </div>
                            <div class="tab-pane fade" id="social">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form action="" method="post">
                                            <input type="hidden" name="_token"
                                                value="s195WfZZZJb3SUAWuuGNZ9Eo2OT4S0jZ1ogZrdon">
                                            <div class=" form-row">
                                                <div class="form-group col-md-12">
                                                    <div class="">
                                                        <h5 class="text-dark">Choose social login to use</h5>
                                                        <div class="selectgroup">
                                                            <label class="selectgroup-item">
                                                                <input type="radio" name="social" id="both" value="both"
                                                                    class="selectgroup-input" checked="">
                                                                <span class="selectgroup-button">Both</span>
                                                            </label>
                                                            <label class="selectgroup-item">
                                                                <input type="radio" name="social" id="facebook"
                                                                    value="facebook" class="selectgroup-input">
                                                                <span class="selectgroup-button">Facebook</span>
                                                            </label>
                                                            <label class="selectgroup-item">
                                                                <input type="radio" name="social" id="google"
                                                                    value="google" class="selectgroup-input">
                                                                <span class="selectgroup-button">Google</span>
                                                            </label>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6 facebook">
                                                    <h5 class="text-dark">App ID</h5>
                                                    <input type="email" name="site_name"
                                                        class="form-control bg-light text-dark" value="locke stock"
                                                        required>
                                                    <small> From developer.facebook.com</small>
                                                </div>
                                                <div class="form-group col-md-6 facebook">
                                                    <h5 class="text-dark">App Secret</h5>
                                                    <input type="text" name="site_name"
                                                        class="form-control bg-light text-dark" value="locke stock"
                                                        required>
                                                    <small> From developer.facebook.com</small>
                                                </div>
                                                <div class="form-group col-md-6 facebook">
                                                    <h5 class="text-dark">Redirect URL</h5>
                                                    <input type="text" name="site_name"
                                                        class="form-control bg-light text-dark" value="locke stock"
                                                        required>
                                                    <small>Set this to your Valid OAuth Redirect URI in
                                                        developers.facebook.com</small>
                                                </div>

                                                <div class="form-group col-md-12">
                                                    <button type="submit" class="px-4 btn btn-primary">Save</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('.select2').select2();
	
	// $('#appinfoform').on('submit', function() {
	// 	// alert('love');
	// 	$.ajax({
	// 		url: "https://lockestocks.com/account/admin/dashboard/updatewebinfo",
	// 		type: 'POST',
	// 		data: $('#appinfoform').serialize(),
	// 		success: function(response) {
	// 			if (response.status === 200) {
	// 				$.notify({
	// 					// options
	// 					icon: 'flaticon-alarm-1',
	// 					title: 'Success',
	// 					message: response.success,
	// 				},{
	// 					// settings
	// 					type: 'success',
	// 					allow_dismiss: true,
	// 					newest_on_top: false,
	// 					placement: {
	// 						from: "top",
	// 						align: "right"
	// 					},
	// 					offset: 20,
	// 					spacing: 10,
	// 					z_index: 1031,
	// 					delay: 5000,
	// 					timer: 1000,
	// 					animate: {
	// 						enter: 'animated fadeInDown',
	// 						exit: 'animated fadeOutUp'
	// 					},
	
	// 				});
	// 			} else {
					
	// 			}
	// 		},
	// 		error: function(error) {
	// 			console.log(error);
	// 			//let errors = error.responseJSON;
	// 			$.notify({
	// 					// options
	// 					icon: 'flaticon-alarm-1',
	// 					title: 'Error',
	// 					message: error,
	// 				},{
	// 					// settings
	// 					type: 'danger',
	// 					allow_dismiss: true,
	// 					newest_on_top: false,
	// 					placement: {
	// 						from: "top",
	// 						align: "right"
	// 					},
	// 					offset: 20,
	// 					spacing: 10,
	// 					z_index: 1031,
	// 					delay: 5000,
	// 					timer: 1000,
	// 					animate: {
	// 						enter: 'animated fadeInDown',
	// 						exit: 'animated fadeOutUp'
	// 					},
	
	// 				});
	// 		},
	
	// 	});
	// });
	
	function changecurr(){
		var e = document.getElementById("select_c");
		var selected = e.options[e.selectedIndex].id;
		document.getElementById("s_c").value = selected;
		console.log(selected);
	}

	$('#updatepreference').on('submit', function() {
		//alert('love');
		$.ajax({
			url: "https://lockestocks.com/account/admin/dashboard/updatepreference",
			type: 'POST',
			data: $('#updatepreference').serialize(),
			success: function(response) {
				if (response.status === 200) {
					$.notify({
						// options
						icon: 'flaticon-alarm-1',
						title: 'Success',
						message: response.success,
					},{
						// settings
						type: 'success',
						allow_dismiss: true,
						newest_on_top: false,
						placement: {
							from: "top",
							align: "right"
						},
						offset: 20,
						spacing: 10,
						z_index: 1031,
						delay: 5000,
						timer: 1000,
						animate: {
							enter: 'animated fadeInDown',
							exit: 'animated fadeOutUp'
						},
	
					});
				} else {
					
				}
			},
			error: function(error) {
				console.log(error);
			},
	
		});
	});

	let sendmail = document.querySelector('#sendmailserver');
    let smtp = document.querySelector('#smtpserver');
    let smtptext = document.querySelectorAll('.smtp');
    //console.log(sendmail);
    sendmail.addEventListener('click', sortform);
    smtp.addEventListener('click', sortform);
    
	if (smtp.checked) {
		smtptext.forEach(smtps => {
			smtps.classList.remove('d-none');
			smtps.setAttribute('required','');
		});
	} 
    function sortform(){
        if (sendmail.checked) {
            smtptext.forEach(element => {
                element.classList.add('d-none');
                element.removeAttribute('required','');
            });
        }
        if (smtp.checked) {
            smtptext.forEach(smtps => {
                smtps.classList.remove('d-none');
                smtps.setAttribute('required','');
            });
        }  
    }

	// Submit email preference form
	$('#emailform').on('submit', function() {
		//alert('love');
		$.ajax({
			url: "https://lockestocks.com/account/admin/dashboard/updateemail",
			type: 'POST',
			data: $('#emailform').serialize(),
			success: function(response) {
				if (response.status === 200) {
					$.notify({
						// options
						icon: 'flaticon-alarm-1',
						title: 'Success',
						message: response.success,
					},{
						// settings
						type: 'success',
						allow_dismiss: true,
						newest_on_top: false,
						placement: {
							from: "top",
							align: "right"
						},
						offset: 20,
						spacing: 10,
						z_index: 1031,
						delay: 5000,
						timer: 1000,
						animate: {
							enter: 'animated fadeInDown',
							exit: 'animated fadeOutUp'
						},
	
					});
				} else {
					
				}
			},
			error: function(error) {
				console.log(error);
			},
		});
	});
	
    </script>

    @include('admin.footer')