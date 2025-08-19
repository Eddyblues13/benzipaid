@include('admin.header')
<div class="main-panel bg-light">
    <div class="content bg-light">
        <div class="page-inner">
            <div class="mt-2 mb-4">
                <h1 class="title1 text-dark">Edit Front page of your website</h1>
            </div>
            <div>

            </div>
            <div>
            </div>
            <div class="mb-5 row">
                <div class="p-3 col-12">
                    <a href="#" data-toggle="modal" data-target="#faqmodal" class="btn btn-light"><i
                            class="fa fa-plus"></i> Add FAQ</a>
                    <div id="faqmodal" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-light">
                                    <h4 class="modal-title" style="text-align:center;">Add Faq</h4>
                                    <button type="button" class="close text-dark" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body bg-light">
                                    <form action="https://lockestocks.com/account/admin/dashboard/savefaq"
                                        method="POST">
                                        <input type="hidden" name="_token"
                                            value="s195WfZZZJb3SUAWuuGNZ9Eo2OT4S0jZ1ogZrdon">
                                        <div class="form-group">
                                            <h5 class="text-dark">Question</h5>
                                            <input type="text" name="question" placeholder="Enter the Question here"
                                                class="form-control bg-light text-dark" required>
                                        </div>
                                        <div class="form-group">
                                            <h5 class="text-dark">Answer</h5>
                                            <textarea name="answer" placeholder="Enter the Answer to the question above"
                                                class="form-control bg-light text-dark" rows="4" required></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="#" data-toggle="modal" data-target="#testi" class="btn btn-light"><i
                            class="fa fa-plus"></i> Add Tesimonial</a>
                    <div id="testi" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-light">
                                    <h4 class="modal-title" style="text-align:center;">Add Testimony</h4>
                                    <button type="button" class="close text-dark" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body bg-light">
                                    <form action="https://lockestocks.com/account/admin/dashboard/savetestimony"
                                        method="post">
                                        <input type="hidden" name="_token"
                                            value="s195WfZZZJb3SUAWuuGNZ9Eo2OT4S0jZ1ogZrdon">
                                        <div class="form-group">
                                            <h5 class="text-dark">Testifier Name</h5>
                                            <input type="text" name="testifier" placeholder="Full name"
                                                class="form-control bg-light text-dark">
                                        </div>
                                        <div class="form-group">
                                            <h5 class=" text-dark">Position</h5>
                                            <input type="text" name="position" placeholder="System user or anonymus"
                                                class="form-control bg-light text-dark">
                                        </div>
                                        <div class="form-group">
                                            <h5 class=" text-dark">What testifier said</h5>
                                            <textarea name="said" class="form-control bg-light text-dark"
                                                rows="4"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <h5 class=" text-dark">Picture</h5>

                                            <select name="picture" class="form-control bg-light text-dark">

                                                <option>iAwfKeabout.png</option>

                                                <option>b9158Babout.jpg</option>

                                                <option>5EJXRd02.jpg1635329727</option>

                                                <option>SIu0JZ01.jpg1635329714</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="#" data-toggle="modal" data-target="#images" class="btn btn-light"><i
                            class="fa fa-plus"></i> Add Image</a>
                    <div id="images" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-light">
                                    <h4 class="modal-title" style="text-align:center;">Add Image</h4>
                                    <button type="button" class="close text-dark" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body bg-light">
                                    <form action="https://lockestocks.com/account/admin/dashboard/saveimg" method="post"
                                        enctype="multipart/form-data">
                                        <input type="hidden" name="_token"
                                            value="s195WfZZZJb3SUAWuuGNZ9Eo2OT4S0jZ1ogZrdon">
                                        <div class="form-group">
                                            <h5 class="text-dark">Title of Image</h5>
                                            <input type="text" name="img_title" placeholder="Name of Image"
                                                class="form-control bg-light text-dark">
                                        </div>
                                        <div class="form-group">
                                            <h5 class="text-dark">Images Description</h5>
                                            <textarea name="img_desc" placeholder="Describe the image"
                                                class="form-control bg-light text-dark" rows="2"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <h5 class="text-dark">Image</h5>
                                            <small>Note: Images Uploaded will be renamed by our system to
                                                'random_characters/name_of_file/random_number'.</small>
                                            <input name="image" class="form-control bg-light text-dark" type="file">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="content" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-light">
                                    <h4 class="modal-title" style="text-align:center;">Add General Content</h4>
                                    <button type="button" class="close text-dark" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body bg-light">
                                    <form action="https://lockestocks.com/account/admin/dashboard/savecontents"
                                        method="post">
                                        <input type="hidden" name="_token"
                                            value="s195WfZZZJb3SUAWuuGNZ9Eo2OT4S0jZ1ogZrdon">
                                        <div class="form-group">
                                            <h5 class=" text-dark">Title of Content</h5>
                                            <input type="text" name="title" placeholder="Name of Content"
                                                class="form-control bg-light text-dark" required>
                                        </div>
                                        <div class="form-group">
                                            <h5 class="text-dark">Content Description</h5>
                                            <textarea name="content" placeholder="Describe the content"
                                                class="form-control bg-light text-dark" rows="2" required></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <nav>
                        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                            <a class="mb-2 nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#1"
                                role="tab" aria-controls="nav-home" aria-selected="true"> FAQ(S)</a>

                            <a class="mb-2 nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#2"
                                role="tab" aria-controls="nav-profile" aria-selected="false">TESTIMONIALS</a>

                            <a class="mb-2 nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#3"
                                role="tab" aria-controls="nav-contact" aria-selected="false">WEBSITE CONTENTS</a>

                            <a class="mb-2 nav-item nav-link" id="nav-about-tab" data-toggle="tab" href="#4" role="tab"
                                aria-controls="nav-about" aria-selected="false">IMAGES</a>
                        </div>
                    </nav>


                    <div class="px-3 py-3 tab-content px-sm-0" id="nav-tabContent">

                        <div class="tab-pane fade show active bg-light card p-3" id="1" role="tabpanel"
                            aria-labelledby="nav-home-tab">
                            <div class="boxes">
                                <div class="row">
                                    <div class="p-1 col-md-4">
                                        <div class="card border p-1 bg-light">
                                            <div class="card-body">
                                                <h5 class="card-title text-dark"><strong>How can i withdraw</strong>
                                                </h5>
                                                <p class="card-text text-dark">This is how to withdraw</p>
                                                <a href="https://lockestocks.com/account/admin/dashboard/delfaq/1"
                                                    type="button" data-toggle="tooltip" title=""
                                                    class="btn btn-sm btn-danger" data-original-title="Remove"><i
                                                        class="fa fa-times"></i></a> &nbsp;
                                                <a href="#" data-toggle="modal" data-target="#editfaq1"
                                                    class="btn btn-primary btn-sm">Edit</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="editfaq1" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-light">
                                                    <h4 class="modal-title" style="text-align:center;">Update Faq</h4>
                                                    <button type="button" class="close text-dark"
                                                        data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body bg-light">
                                                    <form
                                                        action="https://lockestocks.com/account/admin/dashboard/updatefaq"
                                                        method="post">
                                                        <input type="hidden" name="_token"
                                                            value="s195WfZZZJb3SUAWuuGNZ9Eo2OT4S0jZ1ogZrdon">
                                                        <div class="form-group">
                                                            <h5 class="text-dark">Question</h5>
                                                            <input type="text" name="question"
                                                                value="How can i withdraw"
                                                                placeholder="Enter the Question here"
                                                                class="form-control bg-light text-dark" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <h5 class="text-dark">Answer</h5>
                                                            <textarea name="answer"
                                                                placeholder="Enter the Answer to the question above"
                                                                class="form-control bg-light text-dark" rows="4"
                                                                required>This is how to withdraw</textarea>
                                                        </div>
                                                        <input type="hidden" name="id" value="1">
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-1 col-md-4">
                                        <div class="card border p-1 bg-light">
                                            <div class="card-body">
                                                <h5 class="card-title text-dark"><strong>How can i deposit
                                                        money</strong> </h5>
                                                <p class="card-text text-dark">The deposit of course do not hinder</p>
                                                <a href="https://lockestocks.com/account/admin/dashboard/delfaq/2"
                                                    type="button" data-toggle="tooltip" title=""
                                                    class="btn btn-sm btn-danger" data-original-title="Remove"><i
                                                        class="fa fa-times"></i></a> &nbsp;
                                                <a href="#" data-toggle="modal" data-target="#editfaq2"
                                                    class="btn btn-primary btn-sm">Edit</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="editfaq2" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-light">
                                                    <h4 class="modal-title" style="text-align:center;">Update Faq</h4>
                                                    <button type="button" class="close text-dark"
                                                        data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body bg-light">
                                                    <form
                                                        action="https://lockestocks.com/account/admin/dashboard/updatefaq"
                                                        method="post">
                                                        <input type="hidden" name="_token"
                                                            value="s195WfZZZJb3SUAWuuGNZ9Eo2OT4S0jZ1ogZrdon">
                                                        <div class="form-group">
                                                            <h5 class="text-dark">Question</h5>
                                                            <input type="text" name="question"
                                                                value="How can i deposit money"
                                                                placeholder="Enter the Question here"
                                                                class="form-control bg-light text-dark" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <h5 class="text-dark">Answer</h5>
                                                            <textarea name="answer"
                                                                placeholder="Enter the Answer to the question above"
                                                                class="form-control bg-light text-dark" rows="4"
                                                                required>The deposit of course do not hinder</textarea>
                                                        </div>
                                                        <input type="hidden" name="id" value="2">
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>


                        <div class="tab-pane fade card bg-light p-3" id="2" role="tabpanel"
                            aria-labelledby="nav-profile-tab">
                            <div class="boxes">
                                <div class="row">
                                    <div class="p-1 col-md-4">
                                        <div class="card border p-1 bg-light">
                                            <div class="card-body">

                                                <h5 class="card-title text-dark"><strong>Mike Dinne</strong> </h5>
                                                <p class="card-text text-dark">I have invested and its all good, please
                                                    try it out guys</p>
                                            </div>
                                            <ul class="list-group list-group-flush ">
                                                <li class="list-group-item bg-light text-dark"> Investor</li>
                                                <li class="bg-light list-group-item text-dark">SIu0JZ01.jpg1635329714
                                                </li>
                                            </ul>
                                            <div class="card-body">
                                                <a href="https://lockestocks.com/account/admin/dashboard/deltestimony/3"
                                                    type="button" data-toggle="tooltip" title=""
                                                    class="btn btn-sm btn-danger" data-original-title="Remove"><i
                                                        class="fa fa-times"></i></a> &nbsp; &nbsp;
                                                <a href="#" data-toggle="modal" data-target="#edittes3"
                                                    class="btn btn-primary btn-sm">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="edittes3" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-light">
                                                    <h4 class="modal-title" style="text-align:center;">Update Testimony
                                                    </h4>
                                                    <button type="button" class="close text-dark"
                                                        data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body bg-light">
                                                    <form
                                                        action="https://lockestocks.com/account/admin/dashboard/updatetestimony"
                                                        method="post">
                                                        <input type="hidden" name="_token"
                                                            value="s195WfZZZJb3SUAWuuGNZ9Eo2OT4S0jZ1ogZrdon">
                                                        <div class="form-group">
                                                            <h5 class="text-dark">Testifier Name</h5>
                                                            <input type="text" name="testifier" placeholder="Full name"
                                                                value="Mike Dinne"
                                                                class="form-control bg-light text-dark">
                                                        </div>
                                                        <div class="form-group">
                                                            <h5 class=" text-dark">Position</h5>
                                                            <input type="text" name="position" value="Investor"
                                                                placeholder="System user or anonymus"
                                                                class="form-control bg-light text-dark">
                                                        </div>
                                                        <div class="form-group">
                                                            <h5 class=" text-dark">What testifier said</h5>
                                                            <textarea name="said"
                                                                class="form-control bg-light text-dark"
                                                                rows="4">I have invested and its all good, please try it out guys</textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <h5 class=" text-dark">Picture</h5>
                                                            <select name="picture"
                                                                class="form-control bg-light text-dark">
                                                                <option value="SIu0JZ01.jpg1635329714">
                                                                    SIu0JZ01.jpg1635329714</option>

                                                                <option>iAwfKeabout.png</option>

                                                                <option>b9158Babout.jpg</option>

                                                                <option>5EJXRd02.jpg1635329727</option>

                                                                <option>SIu0JZ01.jpg1635329714</option>
                                                            </select>
                                                        </div>
                                                        <input type="hidden" name="id" value="3">
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-1 col-md-4">
                                        <div class="card border p-1 bg-light">
                                            <div class="card-body">

                                                <h5 class="card-title text-dark"><strong>Sarah Ona</strong> </h5>
                                                <p class="card-text text-dark">I love this platform</p>
                                            </div>
                                            <ul class="list-group list-group-flush ">
                                                <li class="list-group-item bg-light text-dark"> Principal</li>
                                                <li class="bg-light list-group-item text-dark">5EJXRd02.jpg1635329727
                                                </li>
                                            </ul>
                                            <div class="card-body">
                                                <a href="https://lockestocks.com/account/admin/dashboard/deltestimony/2"
                                                    type="button" data-toggle="tooltip" title=""
                                                    class="btn btn-sm btn-danger" data-original-title="Remove"><i
                                                        class="fa fa-times"></i></a> &nbsp; &nbsp;
                                                <a href="#" data-toggle="modal" data-target="#edittes2"
                                                    class="btn btn-primary btn-sm">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="edittes2" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-light">
                                                    <h4 class="modal-title" style="text-align:center;">Update Testimony
                                                    </h4>
                                                    <button type="button" class="close text-dark"
                                                        data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body bg-light">
                                                    <form
                                                        action="https://lockestocks.com/account/admin/dashboard/updatetestimony"
                                                        method="post">
                                                        <input type="hidden" name="_token"
                                                            value="s195WfZZZJb3SUAWuuGNZ9Eo2OT4S0jZ1ogZrdon">
                                                        <div class="form-group">
                                                            <h5 class="text-dark">Testifier Name</h5>
                                                            <input type="text" name="testifier" placeholder="Full name"
                                                                value="Sarah Ona"
                                                                class="form-control bg-light text-dark">
                                                        </div>
                                                        <div class="form-group">
                                                            <h5 class=" text-dark">Position</h5>
                                                            <input type="text" name="position" value="Principal"
                                                                placeholder="System user or anonymus"
                                                                class="form-control bg-light text-dark">
                                                        </div>
                                                        <div class="form-group">
                                                            <h5 class=" text-dark">What testifier said</h5>
                                                            <textarea name="said"
                                                                class="form-control bg-light text-dark"
                                                                rows="4">I love this platform</textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <h5 class=" text-dark">Picture</h5>
                                                            <select name="picture"
                                                                class="form-control bg-light text-dark">
                                                                <option value="5EJXRd02.jpg1635329727">
                                                                    5EJXRd02.jpg1635329727</option>

                                                                <option>iAwfKeabout.png</option>

                                                                <option>b9158Babout.jpg</option>

                                                                <option>5EJXRd02.jpg1635329727</option>

                                                                <option>SIu0JZ01.jpg1635329714</option>
                                                            </select>
                                                        </div>
                                                        <input type="hidden" name="id" value="2">
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="tab-pane fade card bg-light p-3" id="3" role="tabpanel"
                            aria-labelledby="nav-contact-tab">
                            <div class="boxes">
                                <div class="row">
                                    <div class="p-1 col-md-3">
                                        <div class="card border p-1 bg-light">
                                            <div class="card-body">
                                                <h5 class="card-title text-dark"><strong>Contact Us</strong> </h5>
                                                <p class="card-text text-dark">Contact Us</p>

                                                <a href="#" data-toggle="modal" data-target="#editcont56"
                                                    class="btn btn-primary btn-sm">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="editcont56" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-light">
                                                    <h4 class="modal-title" style="text-align:center;">Update General
                                                        Content</h4>
                                                    <button type="button" class="close text-dark"
                                                        data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body bg-light">
                                                    <form
                                                        action="https://lockestocks.com/account/admin/dashboard/updatecontents"
                                                        method="post">
                                                        <input type="hidden" name="_token"
                                                            value="s195WfZZZJb3SUAWuuGNZ9Eo2OT4S0jZ1ogZrdon">
                                                        <div class="form-group">
                                                            <h5 class=" text-dark">Title of Content</h5>
                                                            <input type="text" name="title"
                                                                placeholder="Name of Content" value="Contact Us "
                                                                class="form-control bg-light text-dark" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <h5 class="text-dark">Content Description</h5>
                                                            <textarea name="content" placeholder="Describe the content"
                                                                class="form-control bg-light text-dark" rows="2"
                                                                required>Contact Us</textarea>
                                                        </div>
                                                        <input type="hidden" name="id" value="56">
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-1 col-md-3">
                                        <div class="card border p-1 bg-light">
                                            <div class="card-body">
                                                <h5 class="card-title text-dark"><strong>Get in Touch !</strong> </h5>
                                                <p class="card-text text-dark">This is required when, for text is not
                                                    yet available.</p>

                                                <a href="#" data-toggle="modal" data-target="#editcont54"
                                                    class="btn btn-primary btn-sm">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="editcont54" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-light">
                                                    <h4 class="modal-title" style="text-align:center;">Update General
                                                        Content</h4>
                                                    <button type="button" class="close text-dark"
                                                        data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body bg-light">
                                                    <form
                                                        action="https://lockestocks.com/account/admin/dashboard/updatecontents"
                                                        method="post">
                                                        <input type="hidden" name="_token"
                                                            value="s195WfZZZJb3SUAWuuGNZ9Eo2OT4S0jZ1ogZrdon">
                                                        <div class="form-group">
                                                            <h5 class=" text-dark">Title of Content</h5>
                                                            <input type="text" name="title"
                                                                placeholder="Name of Content" value="Get in Touch ! "
                                                                class="form-control bg-light text-dark" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <h5 class="text-dark">Content Description</h5>
                                                            <textarea name="content" placeholder="Describe the content"
                                                                class="form-control bg-light text-dark" rows="2"
                                                                required>This is required when, for text is not yet available.</textarea>
                                                        </div>
                                                        <input type="hidden" name="id" value="54">
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-1 col-md-3">
                                        <div class="card border p-1 bg-light">
                                            <div class="card-body">
                                                <h5 class="card-title text-dark"><strong>Get Started</strong> </h5>
                                                <p class="card-text text-dark">Launch your campaign and benefit from our
                                                    expertise on designing and managing conversion centered bootstrap4
                                                    html page.</p>

                                                <a href="#" data-toggle="modal" data-target="#editcont53"
                                                    class="btn btn-primary btn-sm">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="editcont53" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-light">
                                                    <h4 class="modal-title" style="text-align:center;">Update General
                                                        Content</h4>
                                                    <button type="button" class="close text-dark"
                                                        data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body bg-light">
                                                    <form
                                                        action="https://lockestocks.com/account/admin/dashboard/updatecontents"
                                                        method="post">
                                                        <input type="hidden" name="_token"
                                                            value="s195WfZZZJb3SUAWuuGNZ9Eo2OT4S0jZ1ogZrdon">
                                                        <div class="form-group">
                                                            <h5 class=" text-dark">Title of Content</h5>
                                                            <input type="text" name="title"
                                                                placeholder="Name of Content" value="Get Started "
                                                                class="form-control bg-light text-dark" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <h5 class="text-dark">Content Description</h5>
                                                            <textarea name="content" placeholder="Describe the content"
                                                                class="form-control bg-light text-dark" rows="2"
                                                                required>Launch your campaign and benefit from our expertise on designing and managing conversion centered bootstrap4 html page.</textarea>
                                                        </div>
                                                        <input type="hidden" name="id" value="53">
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-1 col-md-3">
                                        <div class="card border p-1 bg-light">
                                            <div class="card-body">
                                                <h5 class="card-title text-dark"><strong>Support Request</strong> </h5>
                                                <p class="card-text text-dark">Due to its widespread use as filler text
                                                    for layouts, non-readability is of great importance.</p>

                                                <a href="#" data-toggle="modal" data-target="#editcont52"
                                                    class="btn btn-primary btn-sm">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="editcont52" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-light">
                                                    <h4 class="modal-title" style="text-align:center;">Update General
                                                        Content</h4>
                                                    <button type="button" class="close text-dark"
                                                        data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body bg-light">
                                                    <form
                                                        action="https://lockestocks.com/account/admin/dashboard/updatecontents"
                                                        method="post">
                                                        <input type="hidden" name="_token"
                                                            value="s195WfZZZJb3SUAWuuGNZ9Eo2OT4S0jZ1ogZrdon">
                                                        <div class="form-group">
                                                            <h5 class=" text-dark">Title of Content</h5>
                                                            <input type="text" name="title"
                                                                placeholder="Name of Content" value="Support Request "
                                                                class="form-control bg-light text-dark" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <h5 class="text-dark">Content Description</h5>
                                                            <textarea name="content" placeholder="Describe the content"
                                                                class="form-control bg-light text-dark" rows="2"
                                                                required>Due to its widespread use as filler text for layouts, non-readability is of great importance.</textarea>
                                                        </div>
                                                        <input type="hidden" name="id" value="52">
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-1 col-md-3">
                                        <div class="card border p-1 bg-light">
                                            <div class="card-body">
                                                <h5 class="card-title text-dark"><strong>Guides / Support</strong> </h5>
                                                <p class="card-text text-dark">Due to its widespread use as filler text
                                                    for layouts, non-readability is of great importance.</p>

                                                <a href="#" data-toggle="modal" data-target="#editcont51"
                                                    class="btn btn-primary btn-sm">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="editcont51" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-light">
                                                    <h4 class="modal-title" style="text-align:center;">Update General
                                                        Content</h4>
                                                    <button type="button" class="close text-dark"
                                                        data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body bg-light">
                                                    <form
                                                        action="https://lockestocks.com/account/admin/dashboard/updatecontents"
                                                        method="post">
                                                        <input type="hidden" name="_token"
                                                            value="s195WfZZZJb3SUAWuuGNZ9Eo2OT4S0jZ1ogZrdon">
                                                        <div class="form-group">
                                                            <h5 class=" text-dark">Title of Content</h5>
                                                            <input type="text" name="title"
                                                                placeholder="Name of Content" value="Guides / Support "
                                                                class="form-control bg-light text-dark" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <h5 class="text-dark">Content Description</h5>
                                                            <textarea name="content" placeholder="Describe the content"
                                                                class="form-control bg-light text-dark" rows="2"
                                                                required>Due to its widespread use as filler text for layouts, non-readability is of great importance.</textarea>
                                                        </div>
                                                        <input type="hidden" name="id" value="51">
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-1 col-md-3">
                                        <div class="card border p-1 bg-light">
                                            <div class="card-body">
                                                <h5 class="card-title text-dark"><strong>FAQs</strong> </h5>
                                                <p class="card-text text-dark">Due to its widespread use as filler text
                                                    for layouts, non-readability is of great importance.</p>

                                                <a href="#" data-toggle="modal" data-target="#editcont50"
                                                    class="btn btn-primary btn-sm">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="editcont50" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-light">
                                                    <h4 class="modal-title" style="text-align:center;">Update General
                                                        Content</h4>
                                                    <button type="button" class="close text-dark"
                                                        data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body bg-light">
                                                    <form
                                                        action="https://lockestocks.com/account/admin/dashboard/updatecontents"
                                                        method="post">
                                                        <input type="hidden" name="_token"
                                                            value="s195WfZZZJb3SUAWuuGNZ9Eo2OT4S0jZ1ogZrdon">
                                                        <div class="form-group">
                                                            <h5 class=" text-dark">Title of Content</h5>
                                                            <input type="text" name="title"
                                                                placeholder="Name of Content" value="FAQs "
                                                                class="form-control bg-light text-dark" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <h5 class="text-dark">Content Description</h5>
                                                            <textarea name="content" placeholder="Describe the content"
                                                                class="form-control bg-light text-dark" rows="2"
                                                                required>Due to its widespread use as filler text for layouts, non-readability is of great importance.</textarea>
                                                        </div>
                                                        <input type="hidden" name="id" value="50">
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-1 col-md-3">
                                        <div class="card border p-1 bg-light">
                                            <div class="card-body">
                                                <h5 class="card-title text-dark"><strong>Find the help you need</strong>
                                                </h5>
                                                <p class="card-text text-dark">Launch your campaign and benefit from our
                                                    expertise on designing and managing conversion centered bootstrap4
                                                    html page.</p>

                                                <a href="#" data-toggle="modal" data-target="#editcont49"
                                                    class="btn btn-primary btn-sm">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="editcont49" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-light">
                                                    <h4 class="modal-title" style="text-align:center;">Update General
                                                        Content</h4>
                                                    <button type="button" class="close text-dark"
                                                        data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body bg-light">
                                                    <form
                                                        action="https://lockestocks.com/account/admin/dashboard/updatecontents"
                                                        method="post">
                                                        <input type="hidden" name="_token"
                                                            value="s195WfZZZJb3SUAWuuGNZ9Eo2OT4S0jZ1ogZrdon">
                                                        <div class="form-group">
                                                            <h5 class=" text-dark">Title of Content</h5>
                                                            <input type="text" name="title"
                                                                placeholder="Name of Content"
                                                                value="Find the help you need "
                                                                class="form-control bg-light text-dark" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <h5 class="text-dark">Content Description</h5>
                                                            <textarea name="content" placeholder="Describe the content"
                                                                class="form-control bg-light text-dark" rows="2"
                                                                required>Launch your campaign and benefit from our expertise on designing and managing conversion centered bootstrap4 html page.</textarea>
                                                        </div>
                                                        <input type="hidden" name="id" value="49">
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-1 col-md-3">
                                        <div class="card border p-1 bg-light">
                                            <div class="card-body">
                                                <h5 class="card-title text-dark"><strong>Hello!, How can we help
                                                        you?</strong> </h5>
                                                <p class="card-text text-dark">Hello!, How can we help you?</p>

                                                <a href="#" data-toggle="modal" data-target="#editcont48"
                                                    class="btn btn-primary btn-sm">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="editcont48" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-light">
                                                    <h4 class="modal-title" style="text-align:center;">Update General
                                                        Content</h4>
                                                    <button type="button" class="close text-dark"
                                                        data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body bg-light">
                                                    <form
                                                        action="https://lockestocks.com/account/admin/dashboard/updatecontents"
                                                        method="post">
                                                        <input type="hidden" name="_token"
                                                            value="s195WfZZZJb3SUAWuuGNZ9Eo2OT4S0jZ1ogZrdon">
                                                        <div class="form-group">
                                                            <h5 class=" text-dark">Title of Content</h5>
                                                            <input type="text" name="title"
                                                                placeholder="Name of Content"
                                                                value="Hello!, How can we help you? "
                                                                class="form-control bg-light text-dark" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <h5 class="text-dark">Content Description</h5>
                                                            <textarea name="content" placeholder="Describe the content"
                                                                class="form-control bg-light text-dark" rows="2"
                                                                required>Hello!, How can we help you?</textarea>
                                                        </div>
                                                        <input type="hidden" name="id" value="48">
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-1 col-md-3">
                                        <div class="card border p-1 bg-light">
                                            <div class="card-body">
                                                <h5 class="card-title text-dark"><strong>Cryptocurrency</strong> </h5>
                                                <p class="card-text text-dark">Trade and invest Top Cryptocurrency</p>

                                                <a href="#" data-toggle="modal" data-target="#editcont47"
                                                    class="btn btn-primary btn-sm">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="editcont47" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-light">
                                                    <h4 class="modal-title" style="text-align:center;">Update General
                                                        Content</h4>
                                                    <button type="button" class="close text-dark"
                                                        data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body bg-light">
                                                    <form
                                                        action="https://lockestocks.com/account/admin/dashboard/updatecontents"
                                                        method="post">
                                                        <input type="hidden" name="_token"
                                                            value="s195WfZZZJb3SUAWuuGNZ9Eo2OT4S0jZ1ogZrdon">
                                                        <div class="form-group">
                                                            <h5 class=" text-dark">Title of Content</h5>
                                                            <input type="text" name="title"
                                                                placeholder="Name of Content" value="Cryptocurrency "
                                                                class="form-control bg-light text-dark" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <h5 class="text-dark">Content Description</h5>
                                                            <textarea name="content" placeholder="Describe the content"
                                                                class="form-control bg-light text-dark" rows="2"
                                                                required>Trade and invest Top Cryptocurrency</textarea>
                                                        </div>
                                                        <input type="hidden" name="id" value="47">
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-1 col-md-3">
                                        <div class="card border p-1 bg-light">
                                            <div class="card-body">
                                                <h5 class="card-title text-dark"><strong>Always on the go? Mobile
                                                        trading is easier than ever with Online Trade!</strong> </h5>
                                                <p class="card-text text-dark">Get your hands on our customized Trading
                                                    Platform with the comfort of freely trading on the move, to
                                                    experience truly liberating trading sessions.</p>

                                                <a href="#" data-toggle="modal" data-target="#editcont46"
                                                    class="btn btn-primary btn-sm">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="editcont46" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-light">
                                                    <h4 class="modal-title" style="text-align:center;">Update General
                                                        Content</h4>
                                                    <button type="button" class="close text-dark"
                                                        data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body bg-light">
                                                    <form
                                                        action="https://lockestocks.com/account/admin/dashboard/updatecontents"
                                                        method="post">
                                                        <input type="hidden" name="_token"
                                                            value="s195WfZZZJb3SUAWuuGNZ9Eo2OT4S0jZ1ogZrdon">
                                                        <div class="form-group">
                                                            <h5 class=" text-dark">Title of Content</h5>
                                                            <input type="text" name="title"
                                                                placeholder="Name of Content"
                                                                value="Always on the go? Mobile trading is easier than ever with Online Trade! "
                                                                class="form-control bg-light text-dark" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <h5 class="text-dark">Content Description</h5>
                                                            <textarea name="content" placeholder="Describe the content"
                                                                class="form-control bg-light text-dark" rows="2"
                                                                required>Get your hands on our customized Trading Platform with the comfort of freely trading on the move, to experience truly liberating trading sessions.</textarea>
                                                        </div>
                                                        <input type="hidden" name="id" value="46">
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-1 col-md-3">
                                        <div class="card border p-1 bg-light">
                                            <div class="card-body">
                                                <h5 class="card-title text-dark"><strong>24/7 live chat Support</strong>
                                                </h5>
                                                <p class="card-text text-dark">Connect with our 24/7 support and Market
                                                    Analyst on-demand.</p>

                                                <a href="#" data-toggle="modal" data-target="#editcont45"
                                                    class="btn btn-primary btn-sm">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="editcont45" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-light">
                                                    <h4 class="modal-title" style="text-align:center;">Update General
                                                        Content</h4>
                                                    <button type="button" class="close text-dark"
                                                        data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body bg-light">
                                                    <form
                                                        action="https://lockestocks.com/account/admin/dashboard/updatecontents"
                                                        method="post">
                                                        <input type="hidden" name="_token"
                                                            value="s195WfZZZJb3SUAWuuGNZ9Eo2OT4S0jZ1ogZrdon">
                                                        <div class="form-group">
                                                            <h5 class=" text-dark">Title of Content</h5>
                                                            <input type="text" name="title"
                                                                placeholder="Name of Content"
                                                                value="24/7 live chat Support "
                                                                class="form-control bg-light text-dark" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <h5 class="text-dark">Content Description</h5>
                                                            <textarea name="content" placeholder="Describe the content"
                                                                class="form-control bg-light text-dark" rows="2"
                                                                required>Connect with our 24/7 support and Market Analyst on-demand.</textarea>
                                                        </div>
                                                        <input type="hidden" name="id" value="45">
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-1 col-md-3">
                                        <div class="card border p-1 bg-light">
                                            <div class="card-body">
                                                <h5 class="card-title text-dark"><strong>Ultimate Security</strong>
                                                </h5>
                                                <p class="card-text text-dark">With advanced security systems, we keep
                                                    your account always protected.</p>

                                                <a href="#" data-toggle="modal" data-target="#editcont44"
                                                    class="btn btn-primary btn-sm">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="editcont44" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-light">
                                                    <h4 class="modal-title" style="text-align:center;">Update General
                                                        Content</h4>
                                                    <button type="button" class="close text-dark"
                                                        data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body bg-light">
                                                    <form
                                                        action="https://lockestocks.com/account/admin/dashboard/updatecontents"
                                                        method="post">
                                                        <input type="hidden" name="_token"
                                                            value="s195WfZZZJb3SUAWuuGNZ9Eo2OT4S0jZ1ogZrdon">
                                                        <div class="form-group">
                                                            <h5 class=" text-dark">Title of Content</h5>
                                                            <input type="text" name="title"
                                                                placeholder="Name of Content" value="Ultimate Security "
                                                                class="form-control bg-light text-dark" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <h5 class="text-dark">Content Description</h5>
                                                            <textarea name="content" placeholder="Describe the content"
                                                                class="form-control bg-light text-dark" rows="2"
                                                                required>With advanced security systems, we keep your account always protected.</textarea>
                                                        </div>
                                                        <input type="hidden" name="id" value="44">
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-1 col-md-3">
                                        <div class="card border p-1 bg-light">
                                            <div class="card-body">
                                                <h5 class="card-title text-dark"><strong>Fast execution</strong> </h5>
                                                <p class="card-text text-dark">Super-fast trading software, so you never
                                                    suffer slippage.</p>

                                                <a href="#" data-toggle="modal" data-target="#editcont43"
                                                    class="btn btn-primary btn-sm">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="editcont43" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-light">
                                                    <h4 class="modal-title" style="text-align:center;">Update General
                                                        Content</h4>
                                                    <button type="button" class="close text-dark"
                                                        data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body bg-light">
                                                    <form
                                                        action="https://lockestocks.com/account/admin/dashboard/updatecontents"
                                                        method="post">
                                                        <input type="hidden" name="_token"
                                                            value="s195WfZZZJb3SUAWuuGNZ9Eo2OT4S0jZ1ogZrdon">
                                                        <div class="form-group">
                                                            <h5 class=" text-dark">Title of Content</h5>
                                                            <input type="text" name="title"
                                                                placeholder="Name of Content" value="Fast execution "
                                                                class="form-control bg-light text-dark" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <h5 class="text-dark">Content Description</h5>
                                                            <textarea name="content" placeholder="Describe the content"
                                                                class="form-control bg-light text-dark" rows="2"
                                                                required>Super-fast trading software, so you never suffer slippage.</textarea>
                                                        </div>
                                                        <input type="hidden" name="id" value="43">
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-1 col-md-3">
                                        <div class="card border p-1 bg-light">
                                            <div class="card-body">
                                                <h5 class="card-title text-dark"><strong>High leverage</strong> </h5>
                                                <p class="card-text text-dark">Chance to magnify your investment and
                                                    really win big with super-low spreads to further up your profits</p>

                                                <a href="#" data-toggle="modal" data-target="#editcont42"
                                                    class="btn btn-primary btn-sm">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="editcont42" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-light">
                                                    <h4 class="modal-title" style="text-align:center;">Update General
                                                        Content</h4>
                                                    <button type="button" class="close text-dark"
                                                        data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body bg-light">
                                                    <form
                                                        action="https://lockestocks.com/account/admin/dashboard/updatecontents"
                                                        method="post">
                                                        <input type="hidden" name="_token"
                                                            value="s195WfZZZJb3SUAWuuGNZ9Eo2OT4S0jZ1ogZrdon">
                                                        <div class="form-group">
                                                            <h5 class=" text-dark">Title of Content</h5>
                                                            <input type="text" name="title"
                                                                placeholder="Name of Content" value="High leverage "
                                                                class="form-control bg-light text-dark" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <h5 class="text-dark">Content Description</h5>
                                                            <textarea name="content" placeholder="Describe the content"
                                                                class="form-control bg-light text-dark" rows="2"
                                                                required>Chance to magnify your investment and really win big with super-low spreads to further up your profits</textarea>
                                                        </div>
                                                        <input type="hidden" name="id" value="42">
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-1 col-md-3">
                                        <div class="card border p-1 bg-light">
                                            <div class="card-body">
                                                <h5 class="card-title text-dark"><strong>Powerful Trading
                                                        Platforms</strong> </h5>
                                                <p class="card-text text-dark">Online Trade offers multiple platform
                                                    options to cover the needs of each type of trader and investors .
                                                </p>

                                                <a href="#" data-toggle="modal" data-target="#editcont41"
                                                    class="btn btn-primary btn-sm">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="editcont41" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-light">
                                                    <h4 class="modal-title" style="text-align:center;">Update General
                                                        Content</h4>
                                                    <button type="button" class="close text-dark"
                                                        data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body bg-light">
                                                    <form
                                                        action="https://lockestocks.com/account/admin/dashboard/updatecontents"
                                                        method="post">
                                                        <input type="hidden" name="_token"
                                                            value="s195WfZZZJb3SUAWuuGNZ9Eo2OT4S0jZ1ogZrdon">
                                                        <div class="form-group">
                                                            <h5 class=" text-dark">Title of Content</h5>
                                                            <input type="text" name="title"
                                                                placeholder="Name of Content"
                                                                value="Powerful Trading Platforms "
                                                                class="form-control bg-light text-dark" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <h5 class="text-dark">Content Description</h5>
                                                            <textarea name="content" placeholder="Describe the content"
                                                                class="form-control bg-light text-dark" rows="2"
                                                                required>Online Trade offers multiple platform options to cover the needs of each type of trader and investors .</textarea>
                                                        </div>
                                                        <input type="hidden" name="id" value="41">
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-1 col-md-3">
                                        <div class="card border p-1 bg-light">
                                            <div class="card-body">
                                                <h5 class="card-title text-dark"><strong>Explore Our Services</strong>
                                                </h5>
                                                <p class="card-text text-dark">It’s our mission to provide you with a
                                                    delightful and a successful trading experience!</p>

                                                <a href="#" data-toggle="modal" data-target="#editcont40"
                                                    class="btn btn-primary btn-sm">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="editcont40" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-light">
                                                    <h4 class="modal-title" style="text-align:center;">Update General
                                                        Content</h4>
                                                    <button type="button" class="close text-dark"
                                                        data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body bg-light">
                                                    <form
                                                        action="https://lockestocks.com/account/admin/dashboard/updatecontents"
                                                        method="post">
                                                        <input type="hidden" name="_token"
                                                            value="s195WfZZZJb3SUAWuuGNZ9Eo2OT4S0jZ1ogZrdon">
                                                        <div class="form-group">
                                                            <h5 class=" text-dark">Title of Content</h5>
                                                            <input type="text" name="title"
                                                                placeholder="Name of Content"
                                                                value="Explore Our Services "
                                                                class="form-control bg-light text-dark" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <h5 class="text-dark">Content Description</h5>
                                                            <textarea name="content" placeholder="Describe the content"
                                                                class="form-control bg-light text-dark" rows="2"
                                                                required>It’s our mission to provide you with a delightful and a successful trading experience!</textarea>
                                                        </div>
                                                        <input type="hidden" name="id" value="40">
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-1 col-md-3">
                                        <div class="card border p-1 bg-light">
                                            <div class="card-body">
                                                <h5 class="card-title text-dark"><strong>Two Factor Auth</strong> </h5>
                                                <p class="card-text text-dark">Two-factor authentication (2FA) by
                                                    default on all Online Trade accounts, to securely protect you from
                                                    unauthorised access and impersonation.</p>

                                                <a href="#" data-toggle="modal" data-target="#editcont39"
                                                    class="btn btn-primary btn-sm">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="editcont39" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-light">
                                                    <h4 class="modal-title" style="text-align:center;">Update General
                                                        Content</h4>
                                                    <button type="button" class="close text-dark"
                                                        data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body bg-light">
                                                    <form
                                                        action="https://lockestocks.com/account/admin/dashboard/updatecontents"
                                                        method="post">
                                                        <input type="hidden" name="_token"
                                                            value="s195WfZZZJb3SUAWuuGNZ9Eo2OT4S0jZ1ogZrdon">
                                                        <div class="form-group">
                                                            <h5 class=" text-dark">Title of Content</h5>
                                                            <input type="text" name="title"
                                                                placeholder="Name of Content" value="Two Factor Auth "
                                                                class="form-control bg-light text-dark" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <h5 class="text-dark">Content Description</h5>
                                                            <textarea name="content" placeholder="Describe the content"
                                                                class="form-control bg-light text-dark" rows="2"
                                                                required>Two-factor authentication (2FA) by default on all Online Trade accounts, to securely protect you from unauthorised access and impersonation.</textarea>
                                                        </div>
                                                        <input type="hidden" name="id" value="39">
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-1 col-md-3">
                                        <div class="card border p-1 bg-light">
                                            <div class="card-body">
                                                <h5 class="card-title text-dark"><strong>Security</strong> </h5>
                                                <p class="card-text text-dark">Online Trade uses the highest levels of
                                                    Internet Security, and it is secured by 256 bits SSL security
                                                    encryption to ensure that your information is completely protected
                                                    from fraud.</p>

                                                <a href="#" data-toggle="modal" data-target="#editcont38"
                                                    class="btn btn-primary btn-sm">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="editcont38" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-light">
                                                    <h4 class="modal-title" style="text-align:center;">Update General
                                                        Content</h4>
                                                    <button type="button" class="close text-dark"
                                                        data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body bg-light">
                                                    <form
                                                        action="https://lockestocks.com/account/admin/dashboard/updatecontents"
                                                        method="post">
                                                        <input type="hidden" name="_token"
                                                            value="s195WfZZZJb3SUAWuuGNZ9Eo2OT4S0jZ1ogZrdon">
                                                        <div class="form-group">
                                                            <h5 class=" text-dark">Title of Content</h5>
                                                            <input type="text" name="title"
                                                                placeholder="Name of Content" value="Security "
                                                                class="form-control bg-light text-dark" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <h5 class="text-dark">Content Description</h5>
                                                            <textarea name="content" placeholder="Describe the content"
                                                                class="form-control bg-light text-dark" rows="2"
                                                                required>Online Trade uses the highest levels of Internet Security, and it is secured by 256 bits SSL security encryption to ensure that your information is completely protected from fraud.</textarea>
                                                        </div>
                                                        <input type="hidden" name="id" value="38">
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-1 col-md-3">
                                        <div class="card border p-1 bg-light">
                                            <div class="card-body">
                                                <h5 class="card-title text-dark"><strong>Security Comes First</strong>
                                                </h5>
                                                <p class="card-text text-dark">Security Comes first</p>

                                                <a href="#" data-toggle="modal" data-target="#editcont37"
                                                    class="btn btn-primary btn-sm">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="editcont37" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-light">
                                                    <h4 class="modal-title" style="text-align:center;">Update General
                                                        Content</h4>
                                                    <button type="button" class="close text-dark"
                                                        data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body bg-light">
                                                    <form
                                                        action="https://lockestocks.com/account/admin/dashboard/updatecontents"
                                                        method="post">
                                                        <input type="hidden" name="_token"
                                                            value="s195WfZZZJb3SUAWuuGNZ9Eo2OT4S0jZ1ogZrdon">
                                                        <div class="form-group">
                                                            <h5 class=" text-dark">Title of Content</h5>
                                                            <input type="text" name="title"
                                                                placeholder="Name of Content"
                                                                value="Security Comes First "
                                                                class="form-control bg-light text-dark" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <h5 class="text-dark">Content Description</h5>
                                                            <textarea name="content" placeholder="Describe the content"
                                                                class="form-control bg-light text-dark" rows="2"
                                                                required>Security Comes first</textarea>
                                                        </div>
                                                        <input type="hidden" name="id" value="37">
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-1 col-md-3">
                                        <div class="card border p-1 bg-light">
                                            <div class="card-body">
                                                <h5 class="card-title text-dark"><strong>Trade Invest stock, and
                                                        Bond</strong> </h5>
                                                <p class="card-text text-dark">Home page text</p>

                                                <a href="#" data-toggle="modal" data-target="#editcont36"
                                                    class="btn btn-primary btn-sm">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="editcont36" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-light">
                                                    <h4 class="modal-title" style="text-align:center;">Update General
                                                        Content</h4>
                                                    <button type="button" class="close text-dark"
                                                        data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body bg-light">
                                                    <form
                                                        action="https://lockestocks.com/account/admin/dashboard/updatecontents"
                                                        method="post">
                                                        <input type="hidden" name="_token"
                                                            value="s195WfZZZJb3SUAWuuGNZ9Eo2OT4S0jZ1ogZrdon">
                                                        <div class="form-group">
                                                            <h5 class=" text-dark">Title of Content</h5>
                                                            <input type="text" name="title"
                                                                placeholder="Name of Content"
                                                                value="Trade Invest stock, and Bond "
                                                                class="form-control bg-light text-dark" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <h5 class="text-dark">Content Description</h5>
                                                            <textarea name="content" placeholder="Describe the content"
                                                                class="form-control bg-light text-dark" rows="2"
                                                                required>Home page text</textarea>
                                                        </div>
                                                        <input type="hidden" name="id" value="36">
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-1 col-md-3">
                                        <div class="card border p-1 bg-light">
                                            <div class="card-body">
                                                <h5 class="card-title text-dark"><strong>The Better Way to Trade &amp;
                                                        Invest</strong> </h5>
                                                <p class="card-text text-dark">Online Trade helps over 2 million
                                                    customers achieve their financial goals by helping them trade and
                                                    invest with ease</p>

                                                <a href="#" data-toggle="modal" data-target="#editcont35"
                                                    class="btn btn-primary btn-sm">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="editcont35" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-light">
                                                    <h4 class="modal-title" style="text-align:center;">Update General
                                                        Content</h4>
                                                    <button type="button" class="close text-dark"
                                                        data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body bg-light">
                                                    <form
                                                        action="https://lockestocks.com/account/admin/dashboard/updatecontents"
                                                        method="post">
                                                        <input type="hidden" name="_token"
                                                            value="s195WfZZZJb3SUAWuuGNZ9Eo2OT4S0jZ1ogZrdon">
                                                        <div class="form-group">
                                                            <h5 class=" text-dark">Title of Content</h5>
                                                            <input type="text" name="title"
                                                                placeholder="Name of Content"
                                                                value="The Better Way to Trade &amp; Invest "
                                                                class="form-control bg-light text-dark" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <h5 class="text-dark">Content Description</h5>
                                                            <textarea name="content" placeholder="Describe the content"
                                                                class="form-control bg-light text-dark" rows="2"
                                                                required>Online Trade helps over 2 million customers achieve their financial goals by helping them trade and invest with ease</textarea>
                                                        </div>
                                                        <input type="hidden" name="id" value="35">
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-1 col-md-3">
                                        <div class="card border p-1 bg-light">
                                            <div class="card-body">
                                                <h5 class="card-title text-dark"><strong>Email</strong> </h5>
                                                <p class="card-text text-dark">support@brynamics.xyz</p>

                                                <a href="#" data-toggle="modal" data-target="#editcont32"
                                                    class="btn btn-primary btn-sm">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="editcont32" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-light">
                                                    <h4 class="modal-title" style="text-align:center;">Update General
                                                        Content</h4>
                                                    <button type="button" class="close text-dark"
                                                        data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body bg-light">
                                                    <form
                                                        action="https://lockestocks.com/account/admin/dashboard/updatecontents"
                                                        method="post">
                                                        <input type="hidden" name="_token"
                                                            value="s195WfZZZJb3SUAWuuGNZ9Eo2OT4S0jZ1ogZrdon">
                                                        <div class="form-group">
                                                            <h5 class=" text-dark">Title of Content</h5>
                                                            <input type="text" name="title"
                                                                placeholder="Name of Content" value="Email "
                                                                class="form-control bg-light text-dark" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <h5 class="text-dark">Content Description</h5>
                                                            <textarea name="content" placeholder="Describe the content"
                                                                class="form-control bg-light text-dark" rows="2"
                                                                required>support@brynamics.xyz</textarea>
                                                        </div>
                                                        <input type="hidden" name="id" value="32">
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-1 col-md-3">
                                        <div class="card border p-1 bg-light">
                                            <div class="card-body">
                                                <h5 class="card-title text-dark"><strong>Phone Number</strong> </h5>
                                                <p class="card-text text-dark">+234 9xxxxxxxx</p>

                                                <a href="#" data-toggle="modal" data-target="#editcont31"
                                                    class="btn btn-primary btn-sm">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="editcont31" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-light">
                                                    <h4 class="modal-title" style="text-align:center;">Update General
                                                        Content</h4>
                                                    <button type="button" class="close text-dark"
                                                        data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body bg-light">
                                                    <form
                                                        action="https://lockestocks.com/account/admin/dashboard/updatecontents"
                                                        method="post">
                                                        <input type="hidden" name="_token"
                                                            value="s195WfZZZJb3SUAWuuGNZ9Eo2OT4S0jZ1ogZrdon">
                                                        <div class="form-group">
                                                            <h5 class=" text-dark">Title of Content</h5>
                                                            <input type="text" name="title"
                                                                placeholder="Name of Content" value="Phone Number "
                                                                class="form-control bg-light text-dark" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <h5 class="text-dark">Content Description</h5>
                                                            <textarea name="content" placeholder="Describe the content"
                                                                class="form-control bg-light text-dark" rows="2"
                                                                required>+234 9xxxxxxxx</textarea>
                                                        </div>
                                                        <input type="hidden" name="id" value="31">
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-1 col-md-3">
                                        <div class="card border p-1 bg-light">
                                            <div class="card-body">
                                                <h5 class="card-title text-dark"><strong>Address</strong> </h5>
                                                <p class="card-text text-dark">No 10 Mission Road, Nigeria</p>

                                                <a href="#" data-toggle="modal" data-target="#editcont30"
                                                    class="btn btn-primary btn-sm">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="editcont30" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-light">
                                                    <h4 class="modal-title" style="text-align:center;">Update General
                                                        Content</h4>
                                                    <button type="button" class="close text-dark"
                                                        data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body bg-light">
                                                    <form
                                                        action="https://lockestocks.com/account/admin/dashboard/updatecontents"
                                                        method="post">
                                                        <input type="hidden" name="_token"
                                                            value="s195WfZZZJb3SUAWuuGNZ9Eo2OT4S0jZ1ogZrdon">
                                                        <div class="form-group">
                                                            <h5 class=" text-dark">Title of Content</h5>
                                                            <input type="text" name="title"
                                                                placeholder="Name of Content" value="Address "
                                                                class="form-control bg-light text-dark" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <h5 class="text-dark">Content Description</h5>
                                                            <textarea name="content" placeholder="Describe the content"
                                                                class="form-control bg-light text-dark" rows="2"
                                                                required>No 10 Mission Road, Nigeria</textarea>
                                                        </div>
                                                        <input type="hidden" name="id" value="30">
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-1 col-md-3">
                                        <div class="card border p-1 bg-light">
                                            <div class="card-body">
                                                <h5 class="card-title text-dark"><strong>Our Investment
                                                        Packages</strong> </h5>
                                                <p class="card-text text-dark">Choose how you want to invest with us</p>

                                                <a href="#" data-toggle="modal" data-target="#editcont23"
                                                    class="btn btn-primary btn-sm">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="editcont23" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-light">
                                                    <h4 class="modal-title" style="text-align:center;">Update General
                                                        Content</h4>
                                                    <button type="button" class="close text-dark"
                                                        data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body bg-light">
                                                    <form
                                                        action="https://lockestocks.com/account/admin/dashboard/updatecontents"
                                                        method="post">
                                                        <input type="hidden" name="_token"
                                                            value="s195WfZZZJb3SUAWuuGNZ9Eo2OT4S0jZ1ogZrdon">
                                                        <div class="form-group">
                                                            <h5 class=" text-dark">Title of Content</h5>
                                                            <input type="text" name="title"
                                                                placeholder="Name of Content"
                                                                value="Our Investment Packages "
                                                                class="form-control bg-light text-dark" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <h5 class="text-dark">Content Description</h5>
                                                            <textarea name="content" placeholder="Describe the content"
                                                                class="form-control bg-light text-dark" rows="2"
                                                                required>Choose how you want to invest with us</textarea>
                                                        </div>
                                                        <input type="hidden" name="id" value="23">
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-1 col-md-3">
                                        <div class="card border p-1 bg-light">
                                            <div class="card-body">
                                                <h5 class="card-title text-dark"><strong>Start
                                                        Trading/Investing</strong> </h5>
                                                <p class="card-text text-dark">Start trading with Indices commodities
                                                    e.tc</p>

                                                <a href="#" data-toggle="modal" data-target="#editcont16"
                                                    class="btn btn-primary btn-sm">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="editcont16" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-light">
                                                    <h4 class="modal-title" style="text-align:center;">Update General
                                                        Content</h4>
                                                    <button type="button" class="close text-dark"
                                                        data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body bg-light">
                                                    <form
                                                        action="https://lockestocks.com/account/admin/dashboard/updatecontents"
                                                        method="post">
                                                        <input type="hidden" name="_token"
                                                            value="s195WfZZZJb3SUAWuuGNZ9Eo2OT4S0jZ1ogZrdon">
                                                        <div class="form-group">
                                                            <h5 class=" text-dark">Title of Content</h5>
                                                            <input type="text" name="title"
                                                                placeholder="Name of Content"
                                                                value="Start Trading/Investing "
                                                                class="form-control bg-light text-dark" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <h5 class="text-dark">Content Description</h5>
                                                            <textarea name="content" placeholder="Describe the content"
                                                                class="form-control bg-light text-dark" rows="2"
                                                                required>Start trading with Indices commodities e.tc</textarea>
                                                        </div>
                                                        <input type="hidden" name="id" value="16">
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-1 col-md-3">
                                        <div class="card border p-1 bg-light">
                                            <div class="card-body">
                                                <h5 class="card-title text-dark"><strong>Make a Deposit</strong> </h5>
                                                <p class="card-text text-dark">Make A deposit with any of your preffered
                                                    currency</p>

                                                <a href="#" data-toggle="modal" data-target="#editcont15"
                                                    class="btn btn-primary btn-sm">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="editcont15" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-light">
                                                    <h4 class="modal-title" style="text-align:center;">Update General
                                                        Content</h4>
                                                    <button type="button" class="close text-dark"
                                                        data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body bg-light">
                                                    <form
                                                        action="https://lockestocks.com/account/admin/dashboard/updatecontents"
                                                        method="post">
                                                        <input type="hidden" name="_token"
                                                            value="s195WfZZZJb3SUAWuuGNZ9Eo2OT4S0jZ1ogZrdon">
                                                        <div class="form-group">
                                                            <h5 class=" text-dark">Title of Content</h5>
                                                            <input type="text" name="title"
                                                                placeholder="Name of Content" value="Make a Deposit "
                                                                class="form-control bg-light text-dark" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <h5 class="text-dark">Content Description</h5>
                                                            <textarea name="content" placeholder="Describe the content"
                                                                class="form-control bg-light text-dark" rows="2"
                                                                required>Make A deposit with any of your preffered currency</textarea>
                                                        </div>
                                                        <input type="hidden" name="id" value="15">
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-1 col-md-3">
                                        <div class="card border p-1 bg-light">
                                            <div class="card-body">
                                                <h5 class="card-title text-dark"><strong>Create an Account</strong>
                                                </h5>
                                                <p class="card-text text-dark">Create an account with us using your
                                                    preffered email/username</p>

                                                <a href="#" data-toggle="modal" data-target="#editcont14"
                                                    class="btn btn-primary btn-sm">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="editcont14" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-light">
                                                    <h4 class="modal-title" style="text-align:center;">Update General
                                                        Content</h4>
                                                    <button type="button" class="close text-dark"
                                                        data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body bg-light">
                                                    <form
                                                        action="https://lockestocks.com/account/admin/dashboard/updatecontents"
                                                        method="post">
                                                        <input type="hidden" name="_token"
                                                            value="s195WfZZZJb3SUAWuuGNZ9Eo2OT4S0jZ1ogZrdon">
                                                        <div class="form-group">
                                                            <h5 class=" text-dark">Title of Content</h5>
                                                            <input type="text" name="title"
                                                                placeholder="Name of Content" value="Create an Account "
                                                                class="form-control bg-light text-dark" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <h5 class="text-dark">Content Description</h5>
                                                            <textarea name="content" placeholder="Describe the content"
                                                                class="form-control bg-light text-dark" rows="2"
                                                                required>Create an account with us using your preffered email/username</textarea>
                                                        </div>
                                                        <input type="hidden" name="id" value="14">
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-1 col-md-3">
                                        <div class="card border p-1 bg-light">
                                            <div class="card-body">
                                                <h5 class="card-title text-dark"><strong>Get Started</strong> </h5>
                                                <p class="card-text text-dark">How to get started ?</p>

                                                <a href="#" data-toggle="modal" data-target="#editcont13"
                                                    class="btn btn-primary btn-sm">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="editcont13" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-light">
                                                    <h4 class="modal-title" style="text-align:center;">Update General
                                                        Content</h4>
                                                    <button type="button" class="close text-dark"
                                                        data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body bg-light">
                                                    <form
                                                        action="https://lockestocks.com/account/admin/dashboard/updatecontents"
                                                        method="post">
                                                        <input type="hidden" name="_token"
                                                            value="s195WfZZZJb3SUAWuuGNZ9Eo2OT4S0jZ1ogZrdon">
                                                        <div class="form-group">
                                                            <h5 class=" text-dark">Title of Content</h5>
                                                            <input type="text" name="title"
                                                                placeholder="Name of Content" value="Get Started "
                                                                class="form-control bg-light text-dark" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <h5 class="text-dark">Content Description</h5>
                                                            <textarea name="content" placeholder="Describe the content"
                                                                class="form-control bg-light text-dark" rows="2"
                                                                required>How to get started ?</textarea>
                                                        </div>
                                                        <input type="hidden" name="id" value="13">
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-1 col-md-3">
                                        <div class="card border p-1 bg-light">
                                            <div class="card-body">
                                                <h5 class="card-title text-dark"><strong>Who we are</strong> </h5>
                                                <p class="card-text text-dark">online trade
                                                    is a solution for creating an investment management platform. It is
                                                    suited for
                                                    hedge or mutual fund managers and also Forex, stocks, bonds and
                                                    cryptocurrency traders who
                                                    are looking at runing pool trading system. Onlinetrader simplifies
                                                    the investment,
                                                    monitoring and management process. With a secure and compelling
                                                    mobile-first design,
                                                    together with a default front-end design, it takes few minutes to
                                                    setup your own investment
                                                    management or pool trading platform.</p>

                                                <a href="#" data-toggle="modal" data-target="#editcont12"
                                                    class="btn btn-primary btn-sm">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="editcont12" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-light">
                                                    <h4 class="modal-title" style="text-align:center;">Update General
                                                        Content</h4>
                                                    <button type="button" class="close text-dark"
                                                        data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body bg-light">
                                                    <form
                                                        action="https://lockestocks.com/account/admin/dashboard/updatecontents"
                                                        method="post">
                                                        <input type="hidden" name="_token"
                                                            value="s195WfZZZJb3SUAWuuGNZ9Eo2OT4S0jZ1ogZrdon">
                                                        <div class="form-group">
                                                            <h5 class=" text-dark">Title of Content</h5>
                                                            <input type="text" name="title"
                                                                placeholder="Name of Content" value="Who we are "
                                                                class="form-control bg-light text-dark" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <h5 class="text-dark">Content Description</h5>
                                                            <textarea name="content" placeholder="Describe the content"
                                                                class="form-control bg-light text-dark" rows="2"
                                                                required>online trade 
                            is a solution for creating an investment management platform. It is suited for
                            hedge or mutual fund managers and also Forex, stocks, bonds and cryptocurrency traders who
                            are looking at runing pool trading system. Onlinetrader simplifies the investment,
                            monitoring and management process. With a secure and compelling mobile-first design,
                            together with a default front-end design, it takes few minutes to setup your own investment
                            management or pool trading platform.</textarea>
                                                        </div>
                                                        <input type="hidden" name="id" value="12">
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-1 col-md-3">
                                        <div class="card border p-1 bg-light">
                                            <div class="card-body">
                                                <h5 class="card-title text-dark"><strong>About Us</strong> </h5>
                                                <p class="card-text text-dark">About us header</p>

                                                <a href="#" data-toggle="modal" data-target="#editcont11"
                                                    class="btn btn-primary btn-sm">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="editcont11" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-light">
                                                    <h4 class="modal-title" style="text-align:center;">Update General
                                                        Content</h4>
                                                    <button type="button" class="close text-dark"
                                                        data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body bg-light">
                                                    <form
                                                        action="https://lockestocks.com/account/admin/dashboard/updatecontents"
                                                        method="post">
                                                        <input type="hidden" name="_token"
                                                            value="s195WfZZZJb3SUAWuuGNZ9Eo2OT4S0jZ1ogZrdon">
                                                        <div class="form-group">
                                                            <h5 class=" text-dark">Title of Content</h5>
                                                            <input type="text" name="title"
                                                                placeholder="Name of Content" value="About Us "
                                                                class="form-control bg-light text-dark" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <h5 class="text-dark">Content Description</h5>
                                                            <textarea name="content" placeholder="Describe the content"
                                                                class="form-control bg-light text-dark" rows="2"
                                                                required>About us header</textarea>
                                                        </div>
                                                        <input type="hidden" name="id" value="11">
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-1 col-md-3">
                                        <div class="card border p-1 bg-light">
                                            <div class="card-body">
                                                <h5 class="card-title text-dark"><strong>What our Customer
                                                        says!</strong> </h5>
                                                <p class="card-text text-dark">Don&#039;t take our word for it,
                                                    here&#039;s what some of our clients have to say about us</p>

                                                <a href="#" data-toggle="modal" data-target="#editcont5"
                                                    class="btn btn-primary btn-sm">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="editcont5" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-light">
                                                    <h4 class="modal-title" style="text-align:center;">Update General
                                                        Content</h4>
                                                    <button type="button" class="close text-dark"
                                                        data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body bg-light">
                                                    <form
                                                        action="https://lockestocks.com/account/admin/dashboard/updatecontents"
                                                        method="post">
                                                        <input type="hidden" name="_token"
                                                            value="s195WfZZZJb3SUAWuuGNZ9Eo2OT4S0jZ1ogZrdon">
                                                        <div class="form-group">
                                                            <h5 class=" text-dark">Title of Content</h5>
                                                            <input type="text" name="title"
                                                                placeholder="Name of Content"
                                                                value="What our Customer says! "
                                                                class="form-control bg-light text-dark" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <h5 class="text-dark">Content Description</h5>
                                                            <textarea name="content" placeholder="Describe the content"
                                                                class="form-control bg-light text-dark" rows="2"
                                                                required>Don&#039;t take our word for it, here&#039;s what some of our clients have to say about us</textarea>
                                                        </div>
                                                        <input type="hidden" name="id" value="5">
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>


                        <div class="tab-pane fade card bg-light p-3" id="4" role="tabpanel"
                            aria-labelledby="nav-about-tab">
                            <div class="boxes">
                                <div class="row">
                                    <div class="p-1 col-md-4">
                                        <div class="card border p-1 bg-light">
                                            <img src="https://lockestocks.com/account/storage/app/public/photos/iAwfKeabout.png"
                                                class="card-img-top w-50" alt="Image">

                                            <div class="card-body">
                                                <h5 class="card-title text-dark"><strong>About image</strong> </h5>
                                                <p class="card-text text-dark">The image in the about page</p>
                                            </div>
                                            <div class="card-body">
                                                <a href="#" data-toggle="modal" data-target="#editimg15"
                                                    class="btn btn-primary btn-sm">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="editimg15" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-light">
                                                    <h4 class="modal-title" style="text-align:center;">Update Image</h4>
                                                    <button type="button" class="close text-dark"
                                                        data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body bg-light">
                                                    <form
                                                        action="https://lockestocks.com/account/admin/dashboard/updateimg"
                                                        method="post" enctype="multipart/form-data">
                                                        <input type="hidden" name="_token"
                                                            value="s195WfZZZJb3SUAWuuGNZ9Eo2OT4S0jZ1ogZrdon">
                                                        <div class="form-group">
                                                            <h5 class="text-dark">Title of Image</h5>
                                                            <input type="text" name="img_title" value="About image"
                                                                placeholder="Name of Image"
                                                                class="form-control bg-light text-dark">
                                                        </div>
                                                        <div class="form-group">
                                                            <h5 class="text-dark">Images Description</h5>
                                                            <textarea name="img_desc" placeholder="Describe the image"
                                                                class="form-control bg-light text-dark"
                                                                rows="2">The image in the about page</textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <h5 class="text-dark">Image</h5>
                                                            <input name="image" class="form-control bg-light text-dark"
                                                                type="file">
                                                        </div>
                                                        <input type="hidden" name="id" value="15">
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-1 col-md-4">
                                        <div class="card border p-1 bg-light">
                                            <img src="https://lockestocks.com/account/storage/app/public/photos/b9158Babout.jpg"
                                                class="card-img-top w-50" alt="Image">

                                            <div class="card-body">
                                                <h5 class="card-title text-dark"><strong>Home Image</strong> </h5>
                                                <p class="card-text text-dark">The image at the home page</p>
                                            </div>
                                            <div class="card-body">
                                                <a href="#" data-toggle="modal" data-target="#editimg14"
                                                    class="btn btn-primary btn-sm">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="editimg14" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-light">
                                                    <h4 class="modal-title" style="text-align:center;">Update Image</h4>
                                                    <button type="button" class="close text-dark"
                                                        data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body bg-light">
                                                    <form
                                                        action="https://lockestocks.com/account/admin/dashboard/updateimg"
                                                        method="post" enctype="multipart/form-data">
                                                        <input type="hidden" name="_token"
                                                            value="s195WfZZZJb3SUAWuuGNZ9Eo2OT4S0jZ1ogZrdon">
                                                        <div class="form-group">
                                                            <h5 class="text-dark">Title of Image</h5>
                                                            <input type="text" name="img_title" value="Home Image"
                                                                placeholder="Name of Image"
                                                                class="form-control bg-light text-dark">
                                                        </div>
                                                        <div class="form-group">
                                                            <h5 class="text-dark">Images Description</h5>
                                                            <textarea name="img_desc" placeholder="Describe the image"
                                                                class="form-control bg-light text-dark"
                                                                rows="2">The image at the home page</textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <h5 class="text-dark">Image</h5>
                                                            <input name="image" class="form-control bg-light text-dark"
                                                                type="file">
                                                        </div>
                                                        <input type="hidden" name="id" value="14">
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-1 col-md-4">
                                        <div class="card border p-1 bg-light">
                                            <img src="https://lockestocks.com/account/storage/app/public/photos/5EJXRd02.jpg1635329727"
                                                class="card-img-top w-50" alt="Image">

                                            <div class="card-body">
                                                <h5 class="card-title text-dark"><strong>Testimonial 2</strong> </h5>
                                                <p class="card-text text-dark">Testimonial 2</p>
                                            </div>
                                            <div class="card-body">
                                                <a href="#" data-toggle="modal" data-target="#editimg9"
                                                    class="btn btn-primary btn-sm">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="editimg9" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-light">
                                                    <h4 class="modal-title" style="text-align:center;">Update Image</h4>
                                                    <button type="button" class="close text-dark"
                                                        data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body bg-light">
                                                    <form
                                                        action="https://lockestocks.com/account/admin/dashboard/updateimg"
                                                        method="post" enctype="multipart/form-data">
                                                        <input type="hidden" name="_token"
                                                            value="s195WfZZZJb3SUAWuuGNZ9Eo2OT4S0jZ1ogZrdon">
                                                        <div class="form-group">
                                                            <h5 class="text-dark">Title of Image</h5>
                                                            <input type="text" name="img_title" value="Testimonial 2"
                                                                placeholder="Name of Image"
                                                                class="form-control bg-light text-dark">
                                                        </div>
                                                        <div class="form-group">
                                                            <h5 class="text-dark">Images Description</h5>
                                                            <textarea name="img_desc" placeholder="Describe the image"
                                                                class="form-control bg-light text-dark"
                                                                rows="2">Testimonial 2</textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <h5 class="text-dark">Image</h5>
                                                            <input name="image" class="form-control bg-light text-dark"
                                                                type="file">
                                                        </div>
                                                        <input type="hidden" name="id" value="9">
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-1 col-md-4">
                                        <div class="card border p-1 bg-light">
                                            <img src="https://lockestocks.com/account/storage/app/public/photos/SIu0JZ01.jpg1635329714"
                                                class="card-img-top w-50" alt="Image">

                                            <div class="card-body">
                                                <h5 class="card-title text-dark"><strong>Testimonial 1</strong> </h5>
                                                <p class="card-text text-dark">Testimonial 1</p>
                                            </div>
                                            <div class="card-body">
                                                <a href="#" data-toggle="modal" data-target="#editimg8"
                                                    class="btn btn-primary btn-sm">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="editimg8" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-light">
                                                    <h4 class="modal-title" style="text-align:center;">Update Image</h4>
                                                    <button type="button" class="close text-dark"
                                                        data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body bg-light">
                                                    <form
                                                        action="https://lockestocks.com/account/admin/dashboard/updateimg"
                                                        method="post" enctype="multipart/form-data">
                                                        <input type="hidden" name="_token"
                                                            value="s195WfZZZJb3SUAWuuGNZ9Eo2OT4S0jZ1ogZrdon">
                                                        <div class="form-group">
                                                            <h5 class="text-dark">Title of Image</h5>
                                                            <input type="text" name="img_title" value="Testimonial 1"
                                                                placeholder="Name of Image"
                                                                class="form-control bg-light text-dark">
                                                        </div>
                                                        <div class="form-group">
                                                            <h5 class="text-dark">Images Description</h5>
                                                            <textarea name="img_desc" placeholder="Describe the image"
                                                                class="form-control bg-light text-dark"
                                                                rows="2">Testimonial 1</textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <h5 class="text-dark">Image</h5>
                                                            <input name="image" class="form-control bg-light text-dark"
                                                                type="file">
                                                        </div>
                                                        <input type="hidden" name="id" value="8">
                                                        <button type="submit" class="btn btn-primary">Update</button>
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
            </div>
        </div>
    </div>
    @include('admin.footer')