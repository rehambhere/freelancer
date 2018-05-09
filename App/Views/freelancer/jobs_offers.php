<div class="col-xs-12 col-sm-8 content">

    <div class="info-box info-box--large">
        <div class="freelancer-list-page">
            <h3 class="info-box__header">Jobs</h3>
                <div class="media">
                    <div class="media-left">
                        <img class="img-thumbnail img-circle media-object" src="<?php echo assets('images/'.$user->image);?>" style="width:80px; height: 80px" alt="Hire theDesignerz">
                    </div>
                    <div class="media-body">
                        <div class="freelancer-details-header">
                            <a href="user.html">
                                <h3 class="media-heading"><?php echo $jobs->title;?>
                                    <img src="https://cdn3.f-cdn.com/img/flags/png/eg.png" class="flag-icon" alt="Pakistan" title="egypit" aria-label="Pakistan">
                                </h3>
                                <span class="date"><?php echo date('d/m/Y h:i A')?></span>
                                <p class="users"><?php echo $jobs->first_name.''.$jobs->last_name;?></p>
                            </a>

                        </div>
                        <div class="freelancer-card-stats">
                            <label for="rating2" class="control-label">Rating:</label>
                                            <span class="my-rating" id="rating2">
                                            </span>
                            <span style="font-weight: bold; display: block; font-size:20px">My_Budget:-<?php echo $jobs->budget;?>$</span>
                            <span>2000reviews</span>
                        </div>
                        <div class="top-skill">
                            <a href="#"><?php echo $jobs->category;?></a>
                        </div>
                        <div class="bio-profile">
                            <p style="width: 500px">
                                <?php echo html_entity_decode(read_more($jobs->details, 20));?>....
                            </p>
                        </div>

                    </div>
                    <button  class="btn btn-warning pull-right">Read-More</button>
                </div>
                <hr>


            <!-- see offers -->
            <div class="col-xs-12">
                <?php  foreach ($jobs->job_reviews as $job_review){?>
                    <div class="media">
                        <div class="media-left">
                            <img class="img-thumbnail img-circle media-object" src="<?php echo assets('images/'.$user->image);?>" style="width:80px; height: 80px" alt="Hire theDesignerz">
                        </div>
                        <div class="media-body">
                            <div class="freelancer-details-header">

                                    <span class="date"><?php echo date('d/m/Y h:i A')?></span>
                                    <p class="users"><?php echo $job_review->first_name.''.$job_review->last_name;?></p>

                            </div>

                            </div>

                            <div class="bio-profile">
                                <p style="width: 500px">
                                    <?php echo htmlspecialchars($job_review->review);?>
                                </p>
                            </div>

                        </div>
                <?php };?>
            </div>

            <!--- write your offers -->
            <div class="col-xs-12 ">
                    <form action="<?php echo url('/jobs/'.$jobs->title.'/'.$jobs->id.'/add-offers');?>" method="post">
                        <div class="form-group">
                        <label for="id_description" class="control-label">
                       Write your offers
                    </label>
                    <textarea class="form-control js-job-desc" cols="40" id="id_description" name="offers" placeholder="I need a graphic designer for my job. They should work on site 30 hrs / week etc" rows="10"></textarea>
                    <button class="btn btn-warning">send</button>
                    </form>
                </div>
            </div>


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
