<!-- container form-->
<div class="container page--freelancer-form" id="page--freelancer-form">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-4 side">
                <div class="form-container">
                    <h1>Freelancers For Hire
                    </h1>
                    <form action="<?php echo url('/jobs');?>" method="post" data-track-event="job_posted" data-track-params="job_id">
                        <div class="section--basic-fields">
                            <div class="row">
                                <!--name freelancer-->
                                <div class="col-xs-12">
                                    <form class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1">
                                            <span class="input-group-addon" id="basic-addon1"><i class="fa fa-search"></i> </span>
                                        </div>

                                    </form>
                                </div>
                                <!--end title-->

                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group  ">
                                        <!-- work type-->
                                        <label for="id_work_type" class="control-label">
                                            Work Type
                                        </label>

                                        <select class="form-control js-work-type" id="id_work_type" name="work_type" placeholder="">
                                            <option value="1">Hourly</option>
                                            <option value="2">Daily</option>
                                            <option value="3">Weekly</option>
                                            <option value="4">Monthly</option>
                                            <option value="5" selected="selected">Fixed Price</option>
                                        </select>
                                    </div>
                                </div><!--end work type-->

                            </div>
                            <hr>
                            <div class="row">
                                <!-- budget-->
                                <div class="col-xs-12">
                                    <div class="form-group  ">
                                        <label for="id_work_budget" class="control-label">
                                            Budget
                                        </label>

                                        <div class="input-group">
                                            <input class="form-control js-work-budget" id="id_work_budget" name="work_budget" placeholder="e.g. 100" type="number">
                                            <span class="input-group-addon input-group-addon--text">$ USD</span>
                                        </div>
                                    </div><!-- end budget-->
                                </div>
                            </div>
                            <hr>

                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group  ">
                                        <label for="id_working_location" class="control-label">
                                            Working Locations
                                        </label>
                                        <select class="form-control js-working-location" id="id_working_location" name="working_location" placeholder="">
                                            <option value="1">Remotely (Anywhere)</option>
                                            <option value="2">Remotely (Specific Country)</option>
                                            <option value="3">On-site (Specific City)</option>
                                        </select>
                                    </div>

                                </div>

                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-xs-12">

                                    <div class="form-group form-control-location js-form-control-location ">

                                        <label for="id-country" class="control-label">
                                            Location
                                        </label>
                                        <select class="form-control js-location-work" id="id-country" name="country">
                                            <option value="AF">Afghanistan</option>
                                            <option value="AX">Aland Islands</option>
                                            <option value="AL">Albania</option>
                                            <option value="DZ">Algeria</option>
                                            <option value="AS">American Samoa</option>
                                            <option value="AD">Andorra</option>
                                            <option value="AO">Angola</option>
                                            <option value="AI">Anguilla</option>
                                            <option value="AQ">Antarctica</option>
                                            <option value="AG">Antigua And Barbuda</option>
                                            <option value="AR">Argentina</option>
                                            <option value="AM">Armenia</option>
                                            <option value="AW">Aruba</option>
                                            <option value="AU">Australia</option>
                                            <option value="AT">Austria</option>
                                            <option value="AZ">Azerbaijan</option>
                                            <option value="BS">Bahamas</option>
                                            <option value="BH">Bahrain</option>
                                            <option value="BD">Bangladesh</option>
                                            <option value="BB">Barbados</option>
                                            <option value="BY">Belarus</option>
                                            <option value="BE">Belgium</option>
                                            <option value="BZ">Belize</option>
                                            <option value="BJ">Benin</option>
                                            <option value="BM">Bermuda</option>
                                            <option value="BT">Bhutan</option>
                                            <option value="BO">Bolivia, Plurinational State Of</option>
                                            <option value="BQ">Bonaire, Sint Eustatius And Saba</option>
                                            <option value="BA">Bosnia And Herzegovina</option>
                                            <option value="BW">Botswana</option>
                                            <option value="BV">Bouvet Island</option>
                                            <option value="BR">Brazil</option>
                                            <option value="IO">British Indian Ocean Territory</option>
                                            <option value="BN">Brunei Darussalam</option>
                                            <option value="BG">Bulgaria</option>
                                            <option value="BF">Burkina Faso</option>
                                            <option value="BI">Burundi</option>
                                            <option value="KH">Cambodia</option>
                                            <option value="CM">Cameroon</option>
                                            <option value="CA">Canada</option>
                                            <option value="CV">Cape Verde</option>
                                            <option value="KY">Cayman Islands</option>
                                            <option value="CF">Central African Republic</option>
                                            <option value="TD">Chad</option>
                                            <option value="CL">Chile</option>
                                            <option value="CN">China</option>
                                            <option value="CX">Christmas Island</option>
                                            <option value="CC">Cocos (Keeling) Islands</option>
                                            <option value="CO">Colombia</option>
                                            <option value="KM">Comoros</option>
                                            <option value="CG">Congo</option>
                                            <option value="CD">Congo,  The Democratic Republic Of The</option>
                                            <option value="CK">Cook Islands</option>
                                            <option value="CR">Costa Rica</option>
                                            <option value="CI">Cote D Ivoire</option>
                                            <option value="HR">Croatia</option>
                                            <option value="CU">Cuba</option>
                                            <option value="CW">Curacao</option>
                                            <option value="CY">Cyprus</option>
                                            <option value="CZ">Czech Republic</option>
                                            <option value="DK">Denmark</option>
                                            <option value="DJ">Djibouti</option>
                                            <option value="DM">Dominica</option>
                                            <option value="DO">Dominican Republic</option>
                                            <option value="EC">Ecuador</option>
                                            <option value="EG">Egypt</option>
                                            <option value="SV">El Salvador</option>
                                            <option value="GQ">Equatorial Guinea</option>
                                            <option value="ER">Eritrea</option>
                                            <option value="EE">Estonia</option>
                                            <option value="ET">Ethiopia</option>
                                            <option value="FK">Falkland Islands (Malvinas)</option>
                                            <option value="FO">Faroe Islands</option>
                                            <option value="FJ">Fiji</option>
                                            <option value="FI">Finland</option>
                                            <option value="FR">France</option>
                                            <option value="GF">French Guiana</option>
                                            <option value="PF">French Polynesia</option>
                                            <option value="TF">French Southern Territories</option>
                                            <option value="GA">Gabon</option>
                                            <option value="GM">Gambia</option>
                                            <option value="GE">Georgia</option>
                                            <option value="DE">Germany</option>
                                            <option value="GH">Ghana</option>
                                            <option value="GI">Gibraltar</option>
                                            <option value="GR">Greece</option>
                                            <option value="GL">Greenland</option>
                                            <option value="GD">Grenada</option>
                                            <option value="GP">Guadeloupe</option>
                                            <option value="GU">Guam</option>
                                            <option value="GT">Guatemala</option>
                                            <option value="GG">Guernsey</option>
                                            <option value="GN">Guinea</option>
                                            <option value="GW">Guinea-Bissau</option>
                                            <option value="GY">Guyana</option>
                                            <option value="HT">Haiti</option>
                                            <option value="HM">Heard Island And Mcdonald Islands</option>
                                            <option value="VA">Holy See (Vatican City State)</option>
                                            <option value="HN">Honduras</option>
                                            <option value="HK">Hong Kong</option>
                                            <option value="HU">Hungary</option>
                                            <option value="IS">Iceland</option>
                                            <option value="IN">India</option>
                                            <option value="ID">Indonesia</option>
                                            <option value="IR">Iran, Islamic Republic Of</option>
                                            <option value="IQ">Iraq</option>
                                            <option value="IE">Ireland</option>
                                            <option value="IM">Isle Of Man</option>
                                            <option value="IT">Italy</option>
                                            <option value="JM">Jamaica</option>
                                            <option value="JP">Japan</option>
                                            <option value="JE">Jersey</option>
                                            <option value="JO">Jordan</option>
                                            <option value="KZ">Kazakhstan</option>
                                            <option value="KE">Kenya</option>
                                            <option value="KI">Kiribati</option>
                                            <option value="KP">Korea, Democratic PeopleS Republic Of</option>
                                            <option value="KR">Korea, Republic Of</option>
                                            <option value="KW">Kuwait</option>
                                            <option value="KG">Kyrgyzstan</option>
                                            <option value="LA">Lao PeopleS Democratic Republic</option>
                                            <option value="LV">Latvia</option>
                                            <option value="LB">Lebanon</option>
                                            <option value="LS">Lesotho</option>
                                            <option value="LR">Liberia</option>
                                            <option value="LY">Libya</option>
                                            <option value="LI">Liechtenstein</option>
                                            <option value="LT">Lithuania</option>
                                            <option value="LU">Luxembourg</option>
                                            <option value="MO">Macao</option>
                                            <option value="MK">Macedonia, The Former Yugoslav Republic Of</option>
                                            <option value="MG">Madagascar</option>
                                            <option value="MW">Malawi</option>
                                            <option value="MY">Malaysia</option>
                                            <option value="MV">Maldives</option>
                                            <option value="ML">Mali</option>
                                            <option value="MT">Malta</option>
                                            <option value="MH">Marshall Islands</option>
                                            <option value="MQ">Martinique</option>
                                            <option value="MR">Mauritania</option>
                                            <option value="MU">Mauritius</option>
                                            <option value="YT">Mayotte</option>
                                            <option value="MX">Mexico</option>
                                            <option value="FM">Micronesia, Federated States Of</option>
                                            <option value="MD">Moldova, Republic Of</option>
                                            <option value="MC">Monaco</option>
                                            <option value="MN">Mongolia</option>
                                            <option value="ME">Montenegro</option>
                                            <option value="MS">Montserrat</option>
                                            <option value="MA">Morocco</option>
                                            <option value="MZ">Mozambique</option>
                                            <option value="MM">Myanmar</option>
                                            <option value="NA">Namibia</option>
                                            <option value="NR">Nauru</option>
                                            <option value="NP">Nepal</option>
                                            <option value="NL">Netherlands</option>
                                            <option value="NC">New Caledonia</option>
                                            <option value="NZ">New Zealand</option>
                                            <option value="NI">Nicaragua</option>
                                            <option value="NE">Niger</option>
                                            <option value="NG">Nigeria</option>
                                            <option value="NU">Niue</option>
                                            <option value="NF">Norfolk Island</option>
                                            <option value="MP">Northern Mariana Islands</option>
                                            <option value="NO">Norway</option>
                                            <option value="OM">Oman</option>
                                            <option value="PK">Pakistan</option>
                                            <option value="PW">Palau</option>
                                            <option value="PS">Palestine, State Of</option>
                                            <option value="PA">Panama</option>
                                            <option value="PG">Papua New Guinea</option>
                                            <option value="PY">Paraguay</option>
                                            <option value="PE">Peru</option>
                                            <option value="PH">Philippines</option>
                                            <option value="PN">Pitcairn</option>
                                            <option value="PL">Poland</option>
                                            <option value="PT">Portugal</option>
                                            <option value="PR">Puerto Rico</option>
                                            <option value="QA">Qatar</option>
                                            <option value="RE">Reunion</option>
                                            <option value="RO">Romania</option>
                                            <option value="RU">Russian Federation</option>
                                            <option value="RW">Rwanda</option>
                                            <option value="BL">Saint Barthelemy</option>
                                            <option value="SH">Saint Helena, Ascension And Tristan Da Cunha</option>
                                            <option value="KN">Saint Kitts And Nevis</option>
                                            <option value="LC">Saint Lucia</option>
                                            <option value="MF">Saint Martin (French Part)</option>
                                            <option value="PM">Saint Pierre And Miquelon</option>
                                            <option value="VC">Saint Vincent And The Grenadines</option>
                                            <option value="WS">Samoa</option>
                                            <option value="SM">San Marino</option>
                                            <option value="ST">Sao Tome And Principe</option>
                                            <option value="SA">Saudi Arabia</option>
                                            <option value="SN">Senegal</option>
                                            <option value="RS">Serbia</option>
                                            <option value="SC">Seychelles</option>
                                            <option value="SL">Sierra Leone</option>
                                            <option value="SG">Singapore</option>
                                            <option value="SX">Sint Maarten (Dutch Part)</option>
                                            <option value="SK">Slovakia</option>
                                            <option value="SI">Slovenia</option>
                                            <option value="SB">Solomon Islands</option>
                                            <option value="SO">Somalia</option>
                                            <option value="ZA">South Africa</option>
                                            <option value="GS">South Georgia And The South Sandwich Islands</option>
                                            <option value="SS">South Sudan</option>
                                            <option value="ES">Spain</option>
                                            <option value="LK">Sri Lanka</option>
                                            <option value="SD">Sudan</option>
                                            <option value="SR">Suriname</option>
                                            <option value="SJ">Svalbard And Jan Mayen</option>
                                            <option value="SZ">Swaziland</option>
                                            <option value="SE">Sweden</option>
                                            <option value="CH">Switzerland</option>
                                            <option value="SY">Syria</option>
                                            <option value="TW">Taiwan, Province Of China</option>
                                            <option value="TJ">Tajikistan</option>
                                            <option value="TZ">Tanzania, United Republic Of</option>
                                            <option value="TH">Thailand</option>
                                            <option value="TL">Timor-Leste</option>
                                            <option value="TG">Togo</option>
                                            <option value="TK">Tokelau</option>
                                            <option value="TO">Tonga</option>
                                            <option value="TT">Trinidad And Tobago</option>
                                            <option value="TN">Tunisia</option>
                                            <option value="TR">Turkey</option>
                                            <option value="TM">Turkmenistan</option>
                                            <option value="TC">Turks And Caicos Islands</option>
                                            <option value="TV">Tuvalu</option>
                                            <option value="UG">Uganda</option>
                                            <option value="UA">Ukraine</option>
                                            <option value="AE" selected="selected">United Arab Emirates</option>
                                            <option value="GB">United Kingdom</option>
                                            <option value="US">United States</option>
                                            <option value="UM">United States Minor Outlying Islands</option>
                                            <option value="UY">Uruguay</option>
                                            <option value="UZ">Uzbekistan</option>
                                            <option value="VU">Vanuatu</option>
                                            <option value="VE">Venezuela, Bolivarian Republic Of</option>
                                            <option value="VN">Viet Nam</option>
                                            <option value="VG">Virgin Islands, British</option>
                                            <option value="VI">Virgin Islands, U.S.</option>
                                            <option value="WF">Wallis And Futuna</option>
                                            <option value="EH">Western Sahara</option>
                                            <option value="YE">Yemen</option>
                                            <option value="ZM">Zambia</option>
                                            <option value="ZW">Zimbabwe</option>
                                        </select>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- end location-->
                            <!--start rating-->
                            <hr>
                            <div class="row">
                                <div class="col-xs-12">
                                    <label for="rating" class="control-label">Rating:</label>
                                    <div class="my-rating" id="rating"></div>
                                </div>
                            </div>
                            <!--end rating-->
                            <hr>
                            <div class="row">
                                <div class="col-xs-12">
                                    <form class="form-group">
                                        <input type="checkbox" value="1">Online freelancers only
                                    </form>
                                </div>
                            </div>
                        </div>


                    </form>
                </div>

            </div>
            <div class="col-xs-12 col-sm-8 content">

                <div class="info-box info-box--large">
                    <div class="freelancer-list-page">
                        <h3 class="info-box__header">Jobs</h3>
                        <?php foreach ($jobs as $job){?>
                        <div class="media">
                            <div class="media-left">
                                <img class="img-thumbnail img-circle media-object" src="<?php echo assets('images/'.$user->image);?>" style="width:80px; height: 80px" alt="Hire theDesignerz">
                            </div>
                            <div class="media-body">
                                <div class="freelancer-details-header">
                                    <a href="user.html">
                                        <h3 class="media-heading"><?php echo $job->title;?>
                                            <img src="https://cdn3.f-cdn.com/img/flags/png/eg.png" class="flag-icon" alt="Pakistan" title="egypit" aria-label="Pakistan">
                                        </h3>
                                        <span class="date"><?php echo date('d/m/Y h:i A')?></span>
                                        <p class="users"><?php echo $job->first_name.''.$job->last_name;?></p>
                                    </a>

                                </div>
                                <div class="freelancer-card-stats">
                                    <label for="rating2" class="control-label">Rating:</label>
                                            <span class="my-rating" id="rating2">
                                            </span>
                                    <span style="font-weight: bold; display: block; font-size:20px">My_Budget:-<?php echo $job->budget;?>$</span>
                                    <span>2000reviews</span>
                                </div>
                                <div class="top-skill">
                                    <a href="#"><?php echo $job->category;?></a>
                                </div>
                                <div class="bio-profile">
                                    <p style="width: 500px">
                                        <?php echo html_entity_decode(read_more($job->details, 20));?>....
                                    </p>
                                </div>
                                <div class="comment">total_reviews:-
                                     <?php echo $job->total_reviews;?>
                                </div>
                            </div>
                            <a  href="<?php echo url('/jobs/'.$job->title.'/'.$job->id);?>" class="btn btn-warning pull-right">Read-More</a>
                        </div>
                        <hr>
                        <?php }?>

                        <nav aria-label="Page navigation" class="text-center">
                            <ul class="pagination">
                                <li>
                                    <a href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <li><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li>
                                    <a href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                </div>

            </div>

        </div>
    </div>

</div>
<!--end container-->


