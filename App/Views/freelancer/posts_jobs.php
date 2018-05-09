
<header class="with-border col-md-offset-1" style="margin-top: 100px">
    <h1>Post Your Job For Free</h1>
    <aside>Tell us what you need and receive quotes from handpicked freelancers
    </aside>
</header>
<!-- container form-->
<div class="container page--jobs-form" id="page--jobs-form">
    <div class="row">
        <div class="col-xs-12 col-sm-8 main">
            <div class="form-container">
                    <form action="<?php echo url('/posts_jobs/submit');?>" method="post" class="form-modal form" >
                    <div class="section--basic-fields">
                        <div class="row">
                           <!-- name category-->
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <label for="id_category-type">Category</label>
                                    <select class="form-control js-category" id="id_category-type" name="category_id" placeholder="">
                                           <?php foreach ($categories as $category) {?>
                                               <option value="<?php echo $category->id ;?>"><?php echo $category->name;?></option>

                                           <?php }?>
                                    </select>
                                </div>
                            </div>
                            <!--title-->
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <label for="id_title">Title</label>
                                    <input type="text" class="form-control" id="id_title" name="title" placeholder="title">

                                </div>
                            </div>
                            <!--end title-->
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
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
                            <!-- budget-->
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group  ">
                                    <label for="id_work_budget" class="control-label">
                                        Budget
                                    </label>

                                    <div class="input-group">
                                        <input class="form-control js-work-budget" id="id_work_budget" name="budget" placeholder="e.g. 100" type="number">
                                        <span class="input-group-addon input-group-addon--text">$ USD</span>
                                    </div>
                                </div><!-- end budget-->
                            </div>
                        </div>
                        <div class="row">
                            <!-- description-jop-->
                            <div class="col-xs-12 ">
                                <div class="form-group  ">
                                    <label for="id_description" class="control-label">
                                        Describe the work to be done
                                    </label>
                                    <textarea class="form-control js-job-desc" cols="40" id="id_description" name="description" placeholder="I need a graphic designer for my job. They should work on site 30 hrs / week etc" rows="10"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class=" dropper" >

                                    <!--<img src="http://placehold.it/350x150" id="file_preview"><br>
                                    <span>upload file her</span>-->
                                </div>
                                <input type="file" name="file" id="file" accept="images/" style="display: none">

                            </div>
                        </div>
                        <!-- end description-->

                        <!-- end location-->
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group  ">
                                    <label for="id_project_start_date" class="control-label">
                                        Job Start Date
                                    </label>
                                    <div class="input-group input-group--with-icons">
                                        <input class="form-control js-startdate-field" id="id_project_start_date" name="project_start_date" placeholder="Project Start Date" type="text">
                                        <span class="input-group-addon"><i class="nbicon nbicon__calendar-date"></i></span>

                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">

                                <div class="form-group  ">
                                    <label for="id_workload" class="control-label">
                                        Workload

                                    </label>


                                    <input class="form-control" id="id_workload" maxlength="360" name="workload" placeholder="e.g. full-time or part-time" type="text">
                                </div>
                            </div>
                        </div>
                        <!-- end work-->
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group  " style="display: none;">
                                    <label for="id_contract_duration" class="control-label">
                                        Contract Duration
                                    </label>
                                    <div class="input-group">
                                        <input class="form-control js-contract-duration" id="id_contract_duration" min="1" name="contract_duration" placeholder="Work Period (e.g. 2)" type="number">

                                        <span class="input-group-addon input-group-addon--text">Weeks</span>

                                    </div>

                                </div>

                            </div>
                        </div>
                        <!--button-->
                        <div class="clearfix submit-group text-center">
                            <button type="submit" class="btn btn-warning" value="">Post-jobs</button>

                            <button type="submit" class="btn btn-danger">Cancel Job</button>

                        </div>

                    </div>


                </form>
            </div>

        </div>


        <div class="col-xs-12 col-sm-4 sidebar">

            <div class="info-box info-box--large">
                <h3 class="info-box__header">How It Works</h3>
                <div class="info-box__content">
                    <i class="info-box__icon text-primary nbicon nbicon__notepad-pen"></i>
                    <h4 class="info-box__subheader">1. Describe Your Job</h4>
                    <p>
                        Post your Job. We will contact you to discuss your requirements.
                    </p>
                </div>

                <div class="info-box__content">
                    <i class="info-box__icon text-primary nbicon nbicon__users2"></i>
                    <h4 class="info-box__subheader">2. Get Handpicked Freelancers</h4>
                    <p>
                        We will find you up to freelancer  Verified Freelancers based on your requirements
                    </p>
                </div>

                <div class="info-box__content">
                    <i class="info-box__icon text-primary nbicon nbicon__user-checked"></i>
                    <h4 class="info-box__subheader">3. Hire your favourite</h4>
                    <p>
                        Interview and hire the best candidate and get the work delivered
                    </p>
                </div>

                <div class="info-box__content">
                    <i class="info-box__icon text-primary nbicon nbicon__notepad-checked"></i>
                    <h4 class="info-box__subheader">4. Work Delivered</h4>
                    <p>
                        Get your job delivered and pay only at completion when you are 100% satisfied
                    </p>
                </div>

            </div>

        </div>

    </div>
</div>

<div class="clearfix"></div>

