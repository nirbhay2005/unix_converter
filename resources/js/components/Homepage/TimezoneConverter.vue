<template>
    <div class="mt-1">
        <h2>Convert Unix Timestamp to other Timezone</h2>
        <form @submit.prevent="getDate">
            <input :placeholder="stamp" class="shadow-sm t-c rounded-lg" id="timestamp" required size="12"
                   v-model="timestamp">
            <select class="t-l shadow-sm rounded" id="timezone" v-model="timezone">
                <option class="t-c" value="GMT">GMT</option>
                <option class="t-c" value="Africa/Abidjan">Africa/Abidjan</option>
                <option class="t-c" value="Africa/Accra">Africa/Accra</option>
                <option class="t-c" value="Africa/Addis_Ababa">Africa/Addis Ababa</option>
                <option class="t-c" value="Africa/Algiers">Africa/Algiers</option>
                <option class="t-c" value="Africa/Asmara">Africa/Asmara</option>
                <option class="t-c" value="Africa/Bamako">Africa/Bamako</option>
                <option class="t-c" value="Africa/Bangui">Africa/Bangui</option>
                <option class="t-c" value="Africa/Banjul">Africa/Banjul</option>
                <option class="t-c" value="Africa/Bissau">Africa/Bissau</option>
                <option class="t-c" value="Africa/Blantyre">Africa/Blantyre</option>
                <option class="t-c" value="Africa/Brazzaville">Africa/Brazzaville</option>
                <option class="t-c" value="Africa/Bujumbura">Africa/Bujumbura</option>
                <option class="t-c" value="Africa/Cairo">Africa/Cairo</option>
                <option class="t-c" value="Africa/Casablanca">Africa/Casablanca</option>
                <option class="t-c" value="Africa/Ceuta">Africa/Ceuta</option>
                <option class="t-c" value="Africa/Conakry">Africa/Conakry</option>
                <option class="t-c" value="Africa/Dakar">Africa/Dakar</option>
                <option class="t-c" value="Africa/Dar_es_Salaam">Africa/Dar-es-Salaam</option>
                <option class="t-c" value="Africa/Djibouti">Africa/Djibouti</option>
                <option class="t-c" value="Africa/Douala">Africa/Douala</option>
                <option class="t-c" value="Africa/El_Aaiun">Africa/El-Aaiun</option>
                <option class="t-c" value="Africa/Freetown">Africa/Freetown</option>
                <option class="t-c" value="Africa/Gaborone">Africa/Gaborone</option>
                <option class="t-c" value="Africa/Harare">Africa/Harare</option>
                <option class="t-c" value="Africa/Johannesburg">Africa/Johannesburg</option>
                <option class="t-c" value="Africa/Juba">Africa/Juba</option>
                <option class="t-c" value="Africa/Kampala">Africa/Kampala</option>
                <option class="t-c" value="Africa/Khartoum">Africa/Khartoum</option>
                <option class="t-c" value="Africa/Kigali">Africa/Kigali</option>
                <option class="t-c" value="Africa/Kinshasa">Africa/Kinshasa</option>
                <option class="t-c" value="Africa/Lagos">Africa/Lagos</option>
                <option class="t-c" value="Africa/Libreville">Africa/Libreville</option>
                <option class="t-c" value="Africa/Lome">Africa/Lome</option>
                <option class="t-c" value="Africa/Luanda">Africa/Luanda</option>
                <option class="t-c" value="Africa/Lubumbashi">Africa/Lubumbashi</option>
                <option class="t-c" value="Africa/Lusaka">Africa/Lusaka</option>
                <option class="t-c" value="Africa/Malabo">Africa/Malabo</option>
                <option class="t-c" value="Africa/Maputo">Africa/Maputo</option>
                <option class="t-c" value="Africa/Maseru">Africa/Maseru</option>
                <option classWallis="t-c" value="Africa/Mbabane">Africa/Mbabane</option>
                <option class="t-c" value="Africa/Mogadishu">Africa/Mogadishu</option>
                <option class="t-c" value="Africa/Monrovia">Africa/Monrovia</option>
                <option class="t-c" value="Africa/Nairobi">Africa/Nairobi</option>
                <option class="t-c" value="Africa/Ndjamena">Africa/Ndjamena</option>
                <option class="t-c" value="Africa/Niamey">Africa/Niamey</option>
                <option class="t-c" value="Africa/Nouakchott">Africa/Nouakchott</option>
                <option class="t-c" value="Africa/Ouagadougou">Africa/Ouagadougou</option>
                <option class="t-c" value="Africa/Porto-Novo">Africa/Porto-Novo</option>
                <option class="t-c" value="Africa/Sao_Tome">Africa/Sao-Tome</option>
                <option class="t-c" value="Africa/Tripoli">Africa/Tripoli</option>
                <option class="t-c" value="Africa/Tunis">Africa/Tunis</option>
                <option class="t-c" value="Africa/Windhoek">Africa/Windhoek</option>
                <option class="t-c" value="America/Adak">America/Adak</option>
                <option class="t-c" value="America/Anchorage">America/Anchorage</option>
                <option class="t-c" value="America/Anguilla">America/Anguilla</option>
                <option class="t-c" value="America/Antigua">America/Antigua</option>
                <option class="t-c" value="America/Araguaina">America/Araguaina</option>
                <option class="t-c" value="America/Argentina/Buenos_Aires">America/Argentina/Buenos Aires/</option>
                <option class="t-c" value="America/Argentina/Catamarca">America/Argentina/Catamarca</option>
                <option class="t-c" value="America/Argentina/Cordoba">America/Argentina/Cordoba</option>
                <option class="t-c" value="America/Argentina/Jujuy">America/Argentina/Jujuy</option>
                <option class="t-c" value="America/Argentina/La_Rioja">America/Argentina/La Rioja</option>
                <option class="t-c" value="America/Argentina/Mendoza">America/Argentina/Mendoza</option>
                <option class="t-c" value="America/Argentina/Rio_Gallegos">America/Argentina/Rio Gallegos</option>
                <option class="t-c" value="America/Argentina/Salta">America/Argentina/Salta</option>
                <option class="t-c" value="America/Argentina/San_Juan">America/Argentina/San Juan</option>
                <option class="t-c" value="America/Argentina/San_Luis">America/Argentina/San Luis</option>
                <option class="t-c" value="America/Argentina/Tucuman">America/Argentina/Tucuman</option>
                <option class="t-c" value="America/Argentina/Ushuaia">America/Argentina/Ushuaia</option>
                <option class="t-c" value="America/Aruba">America/Aruba</option>
                <option class="t-c" value="America/Asuncion">America/Asuncion</option>
                <option class="t-c" value="America/Atikokan">America/Atikokan</option>
                <option class="t-c" value="America/Bahia">America/Bahia</option>
                <option class="t-c" value="America/Bahia_Banderas">America/Bahia Banderas</option>
                <option class="t-c" value="America/Barbados">America/Barbados</option>
                <option class="t-c" value="America/Belem">America/Belem</option>
                <option class="t-c" value="America/Belize">America/Belize</option>
                <option class="t-c" value="America/Blanc-Sablon">America/Blanc-Sablon</option>
                <option class="t-c" value="America/Boa_Vista">America/Boa Vista</option>
                <option class="t-c" value="America/Bogota">America/Bogota</option>
                <option class="t-c" value="America/Boise">America/Boise</option>
                <option class="t-c" value="America/Cambridge_Bay">America/Cambridge Bay</option>
                <option class="t-c" value="America/Campo_Grande">America/Campo Grande</option>
                <option class="t-c" value="America/Cancun">America/Cancun</option>
                <option class="t-c" value="America/Caracas">America/Caracas</option>
                <option class="t-c" value="America/Cayenne">America/Cayenne</option>
                <option class="t-c" value="America/Cayman">America/Cayman</option>
                <option class="t-c" value="America/Chicago">America/Chicago</option>
                <option class="t-c" value="America/Chihuahua">America/Chihuahua</option>
                <option class="t-c" value="America/Costa_Rica">America/Costa Rica</option>
                <option class="t-c" value="America/Creston">America/Creston</option>
                <option class="t-c" value="America/Cuiaba">America/Cuiaba</option>
                <option class="t-c" value="America/Curacao">America/Curacao</option>
                <option class="t-c" value="America/Danmarkshavn">America/Danmarkshavn</option>
                <option class="t-c" value="America/Dawson">America/Dawson</option>
                <option class="t-c" value="America/Dawson_Creek">America/Dawson Creek</option>
                <option class="t-c" value="America/Denver">America/Denver</option>
                <option class="t-c" value="America/Detroit">America/Detroit</option>
                <option class="t-c" value="America/Dominica">America/Dominica</option>
                <option class="t-c" value="America/Edmonton">America/Edmonton</option>
                <option class="t-c" value="America/Eirunepe">America/Eirunepe</option>
                <option class="t-c" value="America/El_Salvador">America/El Salvador</option>
                <option class="t-c" value="America/Fort_Nelson">America/Fort Nelson</option>
                <option class="t-c" value="America/Fortaleza">America/Fortaleza</option>
                <option class="t-c" value="America/Glace_Bay">America/Glace Bay</option>
                <option class="t-c" value="America/Goose_Bay">America/Goose Bay</option>
                <option class="t-c" value="America/Grand_Turk">America/Grand Turk</option>
                <option class="t-c" value="America/Grenada">America/Grenada</option>
                <option class="t-c" value="America/Guadeloupe">America/Guadeloupe</option>
                <option class="t-c" value="America/Guatemala">America/Guatemala</option>
                <option class="t-c" value="America/Guayaquil">America/Guayaquil</option>
                <option class="t-c" value="America/Guyana">America/Guyana</option>
                <option class="t-c" value="America/Halifax">America/Halifax</option>
                <option class="t-c" value="America/Havana">America/Havana</option>
                <option class="t-c" value="America/Hermosillo">America/Hermosillo</option>
                <option class="t-c" value="America/Indiana/Indianapolis">America/Indiana/Indianapolis</option>
                <option class="t-c" value="America/Indiana/Knox">America/Indiana/Knox</option>
                <option class="t-c" value="America/Indiana/Marengo">America/Indiana/Marengo</option>
                <option class="t-c" value="America/Indiana/Petersburg">America/Indiana/Petersburg</option>
                <option class="t-c" value="America/Indiana/Tell_City">America/Indiana/Tell City</option>
                <option class="t-c" value="America/Indiana/Vevay">America/Indiana/Vevay</option>
                <option class="t-c" value="America/Indiana/Vincennes">America/Indiana/Vincennes</option>
                <option class="t-c" value="America/Indiana/Winamac">America/Indiana/Winamac</option>
                <option class="t-c" value="America/Inuvik">America/Inuvik</option>
                <option class="t-c" value="America/Iqaluit">America/Iqaluit</option>
                <option class="t-c" value="America/Jamaica">America/Jamaica</option>
                <option class="t-c" value="America/Juneau">America/Juneau</option>
                <option class="t-c" value="America/Kentucky/Louisville">America/Kentucky/Louisville</option>
                <option class="t-c" value="America/Kentucky/Monticello">America/Kentucky/Monticello</option>
                <option class="t-c" value="America/Kralendijk">America/Kralendijk</option>
                <option class="t-c" value="America/La_Paz">America/La Paz</option>
                <option class="t-c" value="America/Lima">America/Lima</option>
                <option class="t-c" value="America/Los_Angeles">America/Los Angeles</option>
                <option class="t-c" value="America/Lower_Princes">America/Lower Princes</option>
                <option class="t-c" value="America/Maceio">America/Maceio</option>
                <option class="t-c" value="America/Managua">America/Managua</option>
                <option class="t-c" value="America/Manaus">America/Manaus</option>
                <option class="t-c" value="America/Marigot">America/Marigot</option>
                <option class="t-c" value="America/Martinique">America/Martinique</option>
                <option class="t-c" value="America/Matamoros">America/Matamoros</option>
                <option class="t-c" value="America/Mazatlan">America/Mazatlan</option>
                <option class="t-c" value="America/Menominee">America/Menominee</option>
                <option class="t-c" value="America/Merida">America/Merida</option>
                <option class="t-c" value="America/Metlakatla">America/Metlakatla</option>
                <option class="t-c" value="America/Mexico_City">America/Mexico City</option>
                <option class="t-c" value="America/Miquelon">America/Miquelon</option>
                <option class="t-c" value="America/Moncton">America/Moncton</option>
                <option class="t-c" value="America/Monterrey">America/Monterrey</option>
                <option class="t-c" value="America/Montevideo">America/Montevideo</option>
                <option class="t-c" value="America/Montserrat">America/Montserrat</option>
                <option class="t-c" value="America/Nassau">America/Nassau</option>
                <option class="t-c" value="America/New_York">America/New York</option>
                <option class="t-c" value="America/Nipigon">America/Nipigon</option>
                <option class="t-c" value="America/Nome">America/Nome</option>
                <option class="t-c" value="America/Noronha">America/Noronha</option>
                <option class="t-c" value="America/North_Dakota/Beulah">America/North Dakota/Beulah</option>
                <option class="t-c" value="America/North_Dakota/Center">America/North Dakota/Center</option>
                <option class="t-c" value="America/North_Dakota/New_Salem">America/North Dakota/New Salem</option>
                <option class="t-c" value="America/Nuuk">America/Nuuk</option>
                <option class="t-c" value="America/Ojinaga">America/Ojinaga</option>
                <option class="t-c" value="America/Panama">America/Panama</option>
                <option class="t-c" value="America/Pangnirtung">America/Pangnirtung</option>
                <option class="t-c" value="America/Paramaribo">America/Paramaribo</option>
                <option class="t-c" value="America/Phoenix">America/Phoenix</option>
                <option class="t-c" value="America/Port-au-Prince">America/Port-au-Prince</option>
                <option class="t-c" value="America/Port_of_Spain">America/Port of Spain</option>
                <option class="t-c" value="America/Porto_Velho">America/Porto Velho</option>
                <option class="t-c" value="America/Puerto_Rico">America/Puerto Rico</option>
                <option class="t-c" value="America/Punta_Arenas">America/Punta Arenas</option>
                <option class="t-c" value="America/Rainy_River">America/Rainy River</option>
                <option class="t-c" value="America/Rankin_Inlet">America/Rankin Inlet</option>
                <option class="t-c" value="America/Recife">America/Recife</option>
                <option class="t-c" value="America/Regina">America/Regina</option>
                <option class="t-c" value="America/Resolute">America/Resolute</option>
                <option class="t-c" value="America/Rio_Branco">America/Rio Branco</option>
                <option class="t-c" value="America/Santarem">America/Santarem</option>
                <option class="t-c" value="America/Santiago">America/Santiago</option>
                <option class="t-c" value="America/Santo_Domingo">America/Santo Domingo</option>
                <option class="t-c" value="America/Sao_Paulo">America/Sao Paulo</option>
                <option class="t-c" value="America/Scoresbysund">America/Scoresbysund</option>
                <option class="t-c" value="America/Sitka">America/Sitka</option>
                <option class="t-c" value="America/St_Barthelemy">America/St Barthelemy</option>
                <option class="t-c" value="America/St_Johns">America/St Johns</option>
                <option class="t-c" value="America/St_Kitts">America/St Kitts</option>
                <option class="t-c" value="America/St_Lucia">America/St Lucia</option>
                <option class="t-c" value="America/St_Thomas">America/St Thomas</option>
                <option class="t-c" value="America/St_Vincent">America/St Vincent</option>
                <option class="t-c" value="America/Swift_Current">America/Swift Current</option>
                <option class="t-c" value="America/Tegucigalpa">America/Tegucigalpa</option>
                <option class="t-c" value="America/Thule">America/Thule</option>
                <option class="t-c" value="America/Thunder_Bay">America/Thunder Bay</option>
                <option class="t-c" value="America/Tijuana">America/Tijuana</option>
                <option class="t-c" value="America/Toronto">America/Toronto</option>
                <option class="t-c" value="America/Tortola">America/Tortola</option>
                <option class="t-c" value="America/Vancouver">America/Vancouver</option>
                <option class="t-c" value="America/Whitehorse">America/Whitehorse</option>
                <option class="t-c" value="America/Winnipeg">America/Winnipeg</option>
                <option class="t-c" value="America/Yakutat">America/Yakutat</option>
                <option class="t-c" value="America/Yellowknife">America/Yellowknife</option>
                <option class="t-c" value="Antarctica/Casey">Antarctica/Casey</option>
                <option class="t-c" value="Antarctica/Davis">Antarctica/Davis</option>
                <option class="t-c" value="Antarctica/DumontDUrville">Antarctica/DumontDUrville</option>
                <option class="t-c" value="Antarctica/Macquarie">Antarctica/Macquarie</option>
                <option class="t-c" value="Antarctica/Mawson">Antarctica/Mawson</option>
                <option class="t-c" value="Antarctica/McMurdo">Antarctica/McMurdo</option>
                <option class="t-c" value="Antarctica/Palmer">Antarctica/Palmer</option>
                <option class="t-c" value="Antarctica/Rothera">Antarctica/Rothera</option>
                <option class="t-c" value="Antarctica/Syowa">Antarctica/Syowa</option>
                <option class="t-c" value="Antarctica/Troll">Antarctica/Troll</option>
                <option class="t-c" value="Antarctica/Vostok">Antarctica/Vostok</option>
                <option class="t-c" value="Arctic/Longyearbyen">Arctic/Longyearbyen</option>
                <option class="t-c" value="Asia/Aden">Asia/Aden</option>
                <option class="t-c" value="Asia/Almaty">Asia/Almaty</option>
                <option class="t-c" value="Asia/Amman">Asia/Amman</option>
                <option class="t-c" value="Asia/Anadyr">Asia/Anadyr</option>
                <option class="t-c" value="Asia/Aqtau">Asia/Aqtau</option>
                <option class="t-c" value="Asia/Aqtobe">Asia/Aqtobe</option>
                <option class="t-c" value="Asia/Ashgabat">Asia/Ashgabat</option>
                <option class="t-c" value="Asia/Atyrau">Asia/Atyrau</option>
                <option class="t-c" value="Asia/Baghdad">Asia/Baghdad</option>
                <option class="t-c" value="Asia/Bahrain">Asia/Bahrain</option>
                <option class="t-c" value="Asia/Baku">Asia/Baku</option>
                <option class="t-c" value="Asia/Bangkok">Asia/Bangkok</option>
                <option class="t-c" value="Asia/Barnaul">Asia/Barnaul</option>
                <option class="t-c" value="Asia/Beirut">Asia/Beirut</option>
                <option class="t-c" value="Asia/Bishkek">Asia/Bishkek</option>
                <option class="t-c" value="Asia/Brunei">Asia/Brunei</option>
                <option class="t-c" value="Asia/Chita">Asia/Chita</option>
                <option class="t-c" value="Asia/Choibalsan">Asia/Choibalsan</option>
                <option class="t-c" value="Asia/Colombo">Asia/Colombo</option>
                <option class="t-c" value="Asia/Damascus">Asia/Damascus</option>
                <option class="t-c" value="Asia/Dhaka">Asia/Dhaka</option>
                <option class="t-c" value="Asia/Dili">Asia/Dili</option>
                <option class="t-c" value="Asia/Dubai">Asia/Dubai</option>
                <option class="t-c" value="Asia/Dushanbe">Asia/Dushanbe</option>
                <option class="t-c" value="Asia/Famagusta">Asia/Famagusta</option>
                <option class="t-c" value="Asia/Gaza">Asia/Gaza</option>
                <option class="t-c" value="Asia/Hebron">Asia/Hebron</option>
                <option class="t-c" value="Asia/Ho_Chi_Minh">Asia/Ho Chi Minh</option>
                <option class="t-c" value="Asia/Hong_Kong">Asia/Hong Kong</option>
                <option class="t-c" value="Asia/Hovd">Asia/Hovd</option>
                <option class="t-c" value="Asia/Irkutsk">Asia/Irkutsk</option>
                <option class="t-c" value="Asia/Jakarta">Asia/Jakarta</option>
                <option class="t-c" value="Asia/Jayapura">Asia/Jayapura</option>
                <option class="t-c" value="Asia/Jerusalem">Asia/Jerusalem</option>
                <option class="t-c" value="Asia/Kabul">Asia/Kabul</option>
                <option class="t-c" value="Asia/Kamchatka">Asia/Kamchatka</option>
                <option class="t-c" value="Asia/Karachi">Asia/Karachi</option>
                <option class="t-c" value="Asia/Kathmandu">Asia/Kathmandu</option>
                <option class="t-c" value="Asia/Khandyga">Asia/Khandyga</option>
                <option class="t-c" value="Asia/Kolkata">Asia/Kolkata</option>
                <option class="t-c" value="Asia/Krasnoyarsk">Asia/Krasnoyarsk</option>
                <option class="t-c" value="Asia/Kuala_Lumpur">Asia/Kuala Lumpur</option>
                <option class="t-c" value="Asia/Kuching">Asia/Kuching</option>
                <option class="t-c" value="Asia/Kuwait">Asia/Kuwait</option>
                <option class="t-c" value="Asia/Macau">Asia/Macau</option>
                <option class="t-c" value="Asia/Magadan">Asia/Magadan</option>
                <option class="t-c" value="Asia/Makassar">Asia/Makassar</option>
                <option class="t-c" value="Asia/Manila">Asia/Manila</option>
                <option class="t-c" value="Asia/Muscat">Asia/Muscat</option>
                <option class="t-c" value="Asia/Nicosia">Asia/Nicosia</option>
                <option class="t-c" value="Asia/Novokuznetsk">Asia/Novokuznetsk</option>
                <option class="t-c" value="Asia/Novosibirsk">Asia/Novosibirsk</option>
                <option class="t-c" value="Asia/Omsk">Asia/Omsk</option>
                <option class="t-c" value="Asia/Oral">Asia/Oral</option>
                <option class="t-c" value="Asia/Phnom_Penh">Asia/Phnom Penh</option>
                <option class="t-c" value="Asia/Pontianak">Asia/Pontianak</option>
                <option class="t-c" value="Asia/Pyongyang">Asia/Pyongyang</option>
                <option class="t-c" value="Asia/Qatar">Asia/Qatar</option>
                <option class="t-c" value="Asia/Qostanay">Asia/Qostanay</option>
                <option class="t-c" value="Asia/Qyzylorda">Asia/Qyzylorda</option>
                <option class="t-c" value="Asia/Riyadh">Asia/Riyadh</option>
                <option class="t-c" value="Asia/Sakhalin">Asia/Sakhalin</option>
                <option class="t-c" value="Asia/Samarkand">Asia/Samarkand</option>
                <option class="t-c" value="Asia/Seoul">Asia/Seoul</option>
                <option class="t-c" value="Asia/Shanghai">Asia/Shanghai</option>
                <option class="t-c" value="Asia/Singapore">Asia/Singapore</option>
                <option class="t-c" value="Asia/Srednekolymsk">Asia/Srednekolymsk</option>
                <option class="t-c" value="Asia/Taipei">Asia/Taipei</option>
                <option class="t-c" value="Asia/Tashkent">Asia/Tashkent</option>
                <option class="t-c" value="Asia/Tbilisi">Asia/Tbilisi</option>
                <option class="t-c" value="Asia/Tehran">Asia/Tehran</option>
                <option class="t-c" value="Asia/Thimphu">Asia/Thimphu</option>
                <option class="t-c" value="Asia/Tokyo">Asia/Tokyo</option>
                <option class="t-c" value="Asia/Tomsk">Asia/Tomsk</option>
                <option class="t-c" value="Asia/Ulaanbaatar">Asia/Ulaanbaatar</option>
                <option class="t-c" value="Asia/Urumqi">Asia/Urumqi</option>
                <option class="t-c" value="Asia/Ust-Nera">Asia/Ust-Nera</option>
                <option class="t-c" value="Asia/Vientiane">Asia/Vientiane</option>
                <option class="t-c" value="Asia/Vladivostok">Asia/Vladivostok</option>
                <option class="t-c" value="Asia/Yakutsk">Asia/Yakutsk</option>
                <option class="t-c" value="Asia/Yangon">Asia/Yangon</option>
                <option class="t-c" value="Asia/Yekaterinburg">Asia/Yekaterinburg</option>
                <option class="t-c" value="Asia/Yerevan">Asia/Yerevan</option>
                <option class="t-c" value="Atlantic/Azores">Atlantic/Azores</option>
                <option class="t-c" value="Atlantic/Bermuda">Atlantic/Bermuda</option>
                <option class="t-c" value="Atlantic/Canary">Atlantic/Canary</option>
                <option class="t-c" value="Atlantic/Cape_Verde">Atlantic/Cape Verde</option>
                <option class="t-c" value="Atlantic/Faroe">Atlantic/Faroe</option>
                <option class="t-c" value="Atlantic/Madeira">Atlantic/Madeira</option>
                <option class="t-c" value="Atlantic/Reykjavik">Atlantic/Reykjavik</option>
                <option class="t-c" value="Atlantic/South_Georgia">Atlantic/South Georgia</option>
                <option class="t-c" value="Atlantic/St_Helena">Atlantic/St Helena</option>
                <option class="t-c" value="Atlantic/Stanley">Atlantic/Stanley</option>
                <option class="t-c" value="Australia/Adelaide">Australia/Adelaide</option>
                <option class="t-c" value="Australia/Brisbane">Australia/Brisbane</option>
                <option class="t-c" value="Australia/Broken_Hill">Australia/Broken Hill</option>
                <option class="t-c" value="Australia/Currie">Australia/Currie</option>
                <option class="t-c" value="Australia/Darwin">Australia/Darwin</option>
                <option class="t-c" value="Australia/Eucla">Australia/Eucla</option>
                <option class="t-c" value="Australia/Hobart">Australia/Hobart</option>
                <option class="t-c" value="Australia/Lindeman">Australia/Lindeman</option>
                <option class="t-c" value="Australia/Lord_Howe">Australia/Lord Howe</option>
                <option class="t-c" value="Australia/Melbourne">Australia/Melbourne</option>
                <option class="t-c" value="Australia/Perth">Australia/Perth</option>
                <option class="t-c" value="Australia/Sydney">Australia/Sydney</option>
                <option class="t-c" value="Europe/Amsterdam">Europe/Amsterdam</option>
                <option class="t-c" value="Europe/Andorra">Europe/Andorra</option>
                <option class="t-c" value="Europe/Astrakhan">Europe/Astrakhan</option>
                <option class="t-c" value="Europe/Athens">Europe/Athens</option>
                <option class="t-c" value="Europe/Belgrade">Europe/Belgrade</option>
                <option class="t-c" value="Europe/Berlin">Europe/Berlin</option>
                <option class="t-c" value="Europe/Bratislava">Europe/Bratislava</option>
                <option class="t-c" value="Europe/Brussels">Europe/Brussels</option>
                <option class="t-c" value="Europe/Bucharest">Europe/Bucharest</option>
                <option class="t-c" value="Europe/Budapest">Europe/Budapest</option>
                <option class="t-c" value="Europe/Busingen">Europe/Busingen</option>
                <option class="t-c" value="Europe/Chisinau">Europe/Chisinau</option>
                <option class="t-c" value="Europe/Copenhagen">Europe/Copenhagen</option>
                <option class="t-c" value="Europe/Dublin">Europe/Dublin</option>
                <option class="t-c" value="Europe/Gibraltar">Europe/Gibraltar</option>
                <option class="t-c" value="Europe/Guernsey">Europe/Guernsey</option>
                <option class="t-c" value="Europe/Helsinki">Europe/Helsinki</option>
                <option class="t-c" value="Europe/Isle_of_Man">Europe/Isle of Man</option>
                <option class="t-c" value="Europe/Istanbul">Europe/Istanbul</option>
                <option class="t-c" value="Europe/Jersey">Europe/Jersey</option>
                <option class="t-c" value="Europe/Kaliningrad">Europe/Kaliningrad</option>
                <option class="t-c" value="Europe/Kiev">Europe/Kiev</option>
                <option class="t-c" value="Europe/Kirov">Europe/Kirov</option>
                <option class="t-c" value="Europe/Lisbon">Europe/Lisbon</option>
                <option class="t-c" value="Europe/Ljubljana">Europe/Ljubljana</option>
                <option class="t-c" value="Europe/London">Europe/London</option>
                <option class="t-c" value="Europe/Luxembourg">Europe/Luxembourg</option>
                <option class="t-c" value="Europe/Madrid">Europe/Madrid</option>
                <option class="t-c" value="Europe/Malta">Europe/Malta</option>
                <option class="t-c" value="Europe/Mariehamn">Europe/Mariehamn</option>
                <option class="t-c" value="Europe/Minsk">Europe/Minsk</option>
                <option class="t-c" value="Europe/Monaco">Europe/Monaco</option>
                <option class="t-c" value="Europe/Moscow">Europe/Moscow</option>
                <option class="t-c" value="Europe/Oslo">Europe/Oslo</option>
                <option class="t-c" value="Europe/Paris">Europe/Paris</option>
                <option class="t-c" value="Europe/Podgorica">Europe/Podgorica</option>
                <option class="t-c" value="Europe/Prague">Europe/Prague</option>
                <option class="t-c" value="Europe/Riga">Europe/Riga</option>
                <option class="t-c" value="Europe/Rome">Europe/Rome</option>
                <option class="t-c" value="Europe/Samara">Europe/Samara</option>
                <option class="t-c" value="Europe/San_Marino">Europe/San Marino</option>
                <option class="t-c" value="Europe/Sarajevo">Europe/Sarajevo</option>
                <option class="t-c" value="Europe/Saratov">Europe/Saratov</option>
                <option class="t-c" value="Europe/Simferopol">Europe/Simferopol</option>
                <option class="t-c" value="Europe/Skopje">Europe/Skopje</option>
                <option class="t-c" value="Europe/Sofia">Europe/Sofia</option>
                <option class="t-c" value="Europe/Stockholm">Europe/Stockholm</option>
                <option class="t-c" value="Europe/Tallinn">Europe/Tallinn</option>
                <option class="t-c" value="Europe/Tirane">Europe/Tirane</option>
                <option class="t-c" value="Europe/Ulyanovsk">Europe/Ulyanovsk</option>
                <option class="t-c" value="Europe/Uzhgorod">Europe/Uzhgorod</option>
                <option class="t-c" value="Europe/Vaduz">Europe/Vaduz</option>
                <option class="t-c" value="Europe/Vatican">Europe/Vatican</option>
                <option class="t-c" value="Europe/Vienna">Europe/Vienna</option>
                <option class="t-c" value="Europe/Vilnius">Europe/Vilnius</option>
                <option class="t-c" value="Europe/Volgograd">Europe/Volgograd</option>
                <option class="t-c" value="Europe/Warsaw">Europe/Warsaw</option>
                <option class="t-c" value="Europe/Zagreb">Europe/Zagreb</option>
                <option class="t-c" value="Europe/Zaporozhye">Europe/Zaporozhye</option>
                <option class="t-c" value="Europe/Zurich">Europe/Zurich</option>
                <option class="t-c" value="Indian/Antananarivo">Indian/Antananarivo</option>
                <option class="t-c" value="Indian/Chagos">Indian/Chagos</option>
                <option class="t-c" value="Indian/Christmas">Indian/Christmas</option>
                <option class="t-c" value="Indian/Cocos">Indian/Cocos</option>
                <option class="t-c" value="Indian/Comoro">Indian/Comoro</option>
                <option class="t-c" value="Indian/Kerguelen">Indian/Kerguelen</option>
                <option class="t-c" value="Indian/Mahe">Indian/Mahe</option>
                <option class="t-c" value="Indian/Maldives">Indian/Maldives</option>
                <option class="t-c" value="Indian/Mauritius">Indian/Mauritius</option>
                <option class="t-c" value="Indian/Mayotte">Indian/Mayotte</option>
                <option class="t-c" value="Indian/Reunion">Indian/Reunion</option>
                <option class="t-c" value="Pacific/Apia">Pacific/Apia</option>
                <option class="t-c" value="Pacific/Auckland">Pacific/Auckland</option>
                <option class="t-c" value="Pacific/Bougainville">Pacific/Bougainville</option>
                <option class="t-c" value="Pacific/Chatham">Pacific/Chatham</option>
                <option class="t-c" value="Pacific/Chuuk">Pacific/Chuuk</option>
                <option class="t-c" value="Pacific/Easter">Pacific/Easter</option>
                <option class="t-c" value="Pacific/Efate">Pacific/Efate</option>
                <option class="t-c" value="Pacific/Enderbury">Pacific/Enderbury</option>
                <option class="t-c" value="Pacific/Fakaofo">Pacific/Fakaofo</option>
                <option class="t-c" value="Pacific/Fiji">Pacific/Fiji</option>
                <option class="t-c" value="Pacific/Funafuti">Pacific/Funafuti</option>
                <option class="t-c" value="Pacific/Galapagos">Pacific/Galapagos</option>
                <option class="t-c" value="Pacific/Gambier">Pacific/Gambier</option>
                <option class="t-c" value="Pacific/Guadalcanal">Pacific/Guadalcanal</option>
                <option class="t-c" value="Pacific/Guam">Pacific/Guam</option>
                <option class="t-c" value="Pacific/Honolulu">Pacific/Honolulu</option>
                <option class="t-c" value="Pacific/Kiritimati">Pacific/Kiritimati</option>
                <option class="t-c" value="Pacific/Kosrae">Pacific/Kosrae</option>
                <option class="t-c" value="Pacific/Kwajalein">Pacific/Kwajalein</option>
                <option class="t-c" value="Pacific/Majuro">Pacific/Majuro</option>
                <option class="t-c" value="Pacific/Marquesas">Pacific/Marquesas</option>
                <option class="t-c" value="Pacific/Midway">Pacific/Midway</option>
                <option class="t-c" value="Pacific/Nauru">Pacific/Nauru</option>
                <option class="t-c" value="Pacific/Niue">Pacific/Niue</option>
                <option class="t-c" value="Pacific/Norfolk">Pacific/Norfolk</option>
                <option class="t-c" value="Pacific/Noumea">Pacific/Noumea</option>
                <option class="t-c" value="Pacific/Pago_Pago">Pacific/Pago Pago</option>
                <option class="t-c" value="Pacific/Palau">Pacific/Palau</option>
                <option class="t-c" value="Pacific/Pitcairn">Pacific/Pitcairn</option>
                <option class="t-c" value="Pacific/Pohnpei">Pacific/Pohnpei</option>
                <option class="t-c" value="Pacific/Port_Moresby">Pacific/Port Moresby</option>
                <option class="t-c" value="Pacific/Rarotonga">Pacific/Rarotonga</option>
                <option class="t-c" value="Pacific/Saipan">Pacific/Saipan</option>
                <option class="t-c" value="Pacific/Tahiti">Pacific/Tahiti</option>
                <option class="t-c" value="Pacific/Tarawa">Pacific/Tarawa</option>
                <option class="t-c" value="Pacific/Tongatapu">Pacific/Tongatapu</option>
                <option class="t-c" value="Pacific/Wake">Pacific/Wake</option>
                <option class="t-c" value="Pacific/Wallis">Pacific/Wallis</option>
            </select><br>
            <button class="btn-dark t-c rounded-lg mt-2" id="submit" type="submit">Timestamp to Timezone</button>
        </form>
        <div class="result-box mt-3" v-if="response">
            <p><b>Date</b> : {{info.date}} </p>
            <p><b>Timezone</b>: {{info.timezone.timezone}}</p>
            <p><b>Offset</b> : {{info.offset}}</p>
        </div>
        <div class="error-box mt-3" v-if="error">
            <p>Sorry, this timestamp is not valid.</p>
            <p>Check your timestamp, strip letters and punctuation marks.</p>
        </div>
    </div>
</template>

<script>
    export default {
        name: "TimezoneConverter",
        data() {
            return {
                error: false,
                info: '',
                timestamp: '',
                response: false,
                timezone: "GMT"
            }
        },
        computed: {
            stamp() {
                return this.timestamp = Math.floor(Date.now() / 1000)
            }
        },
        methods: {
            getDate() {
                axios.post('api/timezone', {timestamp: this.timestamp, timezone: this.timezone})
                    .then((response) => {
                        this.info = response.data.data
                        this.response = true
                        this.error = false
                    })
                    .catch(error => {
                        this.error = true
                    });
                this.response = false;
            },
        }
    }
</script>

<style scoped>
    #timestamp {
        height: 40px;
        width: 115px;
    }

    #timezone {
        height: 40px;
    }

    #submit {
        width: 230px;
        height: 40px;
    }

    .result-box {
        line-height: 12px;
    }

    h2 {
        color: black;
        font-weight: bold;
        text-shadow: 2px 2px grey;
    }

    @media screen and (max-width: 414px) {
        .t-l {
            margin-left: 0px;
        }

        #timestamp {
            width: 100px;
            height: 30px;
        }

        #timezone {
            margin-top: 10px;
            height: 30px;
        }

        #submit {
            width: 185px;
            height: 30px;
        }

        .result-box {
            font-size: x-small;
        }

        h2 {
            font-size: x-large;
        }

        .t-c {
            font-size: small;
        }

        .result-box {
            line-height: 5px;
        }
    }
</style>
