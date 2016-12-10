<?php
session_start();
include 'php/Fonctions.php';
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Wiki</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="scripts/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="scripts/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Icons -->
    <link href="scripts/icons/general/stylesheets/general_foundicons.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="scripts/icons/social/stylesheets/social_foundicons.css" media="screen" rel="stylesheet" type="text/css" />
    <!--[if lt IE 8]>
    <link href="scripts/icons/general/stylesheets/general_foundicons_ie7.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="scripts/icons/social/stylesheets/social_foundicons_ie7.css" media="screen" rel="stylesheet" type="text/css" />
    <![endif]-->
    <link rel="stylesheet" href="scripts/fontawesome/css/font-awesome.min.css">
    <!--[if IE 7]>
    <link rel="stylesheet" href="scripts/fontawesome/css/font-awesome-ie7.min.css">
    <![endif]-->



    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Palatino+Linotype" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Abel" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">

    <link href="styles/custom.css" rel="stylesheet" type="text/css" />
</head>
<body id="pageBody">

    <div id="decorative2">
        <div class="container">

            <div class="divPanel topArea notop nobottom">
                <div class="row-fluid">
                    <div class="span12">

                        <div id="divLogo" class="pull-left">
                            <a href="index" id="divSiteTitle">E.W.R</a><br />
                            <a href="index" id="divTagLine">Easy Waiting Room</a>
                        </div>

                        <div id="divMenuRight" class="pull-right">
                        <div class="navbar">
                            <button type="button" class="btn btn-navbar-highlight btn-large btn-primary" data-toggle="collapse" data-target=".nav-collapse">
                                NAVIGATION <span class="icon-chevron-down icon-white"></span>
                            </button>
                            <div class="nav-collapse collapse">
                                <ul class="nav nav-pills ddmenu">
                                   <?php echo genereMenu('contact')?>
                                </ul>
                            </div>
                        </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <div id="contentOuterSeparator"></div>


    <div class="container">

        <!-- <div class="breadcrumbs">
            <a href="index.php">Home</a> &nbsp;/&nbsp; <span>Nous contacter</span>
        </div> -->

      <!-- Docs nav
      ================================================== -->
      <div class="row">
        <div class="span3 bs-docs-sidebar">
          <ul class="nav nav-list bs-docs-sidenav">
              <div class="breadcrumbs">
                  <a href="index.php">Home</a> &nbsp;/&nbsp; <span>Nous contacter</span>
              </div>
            <li><a href="#installation"><i class="icon-chevron-right"></i> Installation</a></li>
            <li><a href="#pagestructure"><i class="icon-chevron-right"></i> Page Structure</a></li>
            <li><a href="#logosettings"><i class="icon-chevron-right"></i> Editing Logo</a></li>
            <li><a href="#menusettings"><i class="icon-chevron-right"></i> Editing Menu Settings</a></li>
            <li><a href="#header"><i class="icon-chevron-right"></i> Editing Header Image</a></li>
            <li><a href="#footersettings"><i class="icon-chevron-right"></i> Footer Content</a></li>
            <li><a href="#backgroundsettings"><i class="icon-chevron-right"></i> Changing Backgrounds</a></li>
            <li><a href="#carousalsettings"><i class="icon-chevron-right"></i> Editing Carousal</a></li>
            <li><a href="#portfoliosettings"><i class="icon-chevron-right"></i> Editing Portfolio</a></li>
            <li><a href="#colorsettings"><i class="icon-chevron-right"></i> Emphasise through Color</a></li>
            <li><a href="#contactsettings"><i class="icon-chevron-right"></i> Setting up Contact Form</a></li>
            <li><a href="#ftpsettings"><i class="icon-chevron-right"></i> Uploading site via FTP</a></li>
            <li><a href="#thirdpartysettings"><i class="icon-chevron-right"></i> Third Party Scripts</a></li>
          </ul>
        </div>
        <div class="span9">



          <!-- Global Bootstrap settings
          ================================================== -->
          <section id="installation">

              <h1>Installation</h1>
              </br>
              <img src="assets/img/gen-1-grey.png" class="img-polaroid" alt="Responsive Bootstrap Theme"/>
              </br></br>
              <p>Follow the steps below to start working on this Responsive Bootstrap Theme:</p>

              <ol>

                  <li>Unzip the download file <code>bootstrap-gen-1.zip</code> to a new folder that you can name as 'my site'. Your unzipped file will have two main folder.  One is a folder named 'documentation' to guide you through customizing the template and the second one is named <strong>'site'</strong> which is the actual one that holds all the files and folders you will be working on.</li>
                  <li>Once your site is completed you will need to upload these files to your Web Server using FTP in order to use it on your Website.</li>
                  <li>Make sure you upload the required files/folders listed below (don't upload the documentation folder):

                      <ul>

                          <li><code>assets/</code> - jQuery scripts Folder</li>
                          <li><code>email/</code> - Email scripts Folder (required to make the contact form functional)</li>
                          <li><code>images/</code> - Images Folder</li>
                          <li><code>portfolio/</code> - Portfolio Folder for portfolio page thumbnails and large previews</li>
                          <li><code>scripts/</code> - Bootstrap jQuery and CSS files Folder</li>
                          <li><code>slider-images/</code> - Slider images Folder</li>
                          <li><code>styles/</code> - Custom style sheet and layout backgrounds Folder</li>
                          <li><code>index.html</code> - Home-Page and other site html pages including contact.php page</li>

                      </ul>
                     </br>
                  </li>
                  <li>You're now good to go..! Start adding your Content and show off your Brand New Beautiful Website in style.</li>

              </ol>


          </section>


          <hr class="bs-docs-separator">


          <section id="pagestructure">


              <h1>Page Structure</h1>

              <p>All the content is enclosed in <code>#pageBody</code></p>

    <pre class="prettyprint linenums">&lt;body id="pageBody"&gt;
      ...
    &lt;/div&gt;</pre>



              <h3>The page is divided into 5 Areas:</h3>

              <ol>

                  <li>Logo Area - <code>#divLogo</code></li>
                  <li>Top Navigation Area - <code>#navbar</code></li>
                  <li>Header Area - <code>#divPanel headerArea</code></li>
                  <li>Main Content Area - <code>#contentArea</code></li>
                  <li>Footer - <code>#divFooter</code></li>

              </ol>

              <p><code>#divPanel headerArea</code> - Only on Home Page</p>



              <h3>Grid Structure</h3>

              <ul>

                  <li><code>.sidebar</code> - Sidebar</li>
                  <li><code>.span12</code> - Full Column (Full Page)</li>
                  <li><code>.span6</code> - Half Column</li>
                  <li><code>.span4</code> - One-Third Column</li>
                  <li><code>.span8</code> - Two-Third Column</li>
                  <li><code>.span3</code> - One-Fourth Column</li>
                  <li><code>.span9</code> - Three-Fourth Column</li>
                  <li><code>.span2</code> - One-Sixth Column</li>
                  <li><code>.span4</code> - Two-Sixth Column</li>
                  <li><code>.span10</code> - Five-Sixth Column</li>

              </ul>
              </br>
              <p>Bootstrap Documentation for scaffolding at: <a href="http://getbootstrap.com/2.3.2/scaffolding.html#gridSystem">http://getbootstrap.com/2.3.2/scaffolding.html#gridSystem</a></p>


          </section>


          <hr class="bs-docs-separator">


          <section id="logosettings">


              <h1>Logo Editing</h1>

              <p>The Logo Container can be found in between the commented tags - <code>!--Edit Logo here--</code></p>

    <pre class="prettyprint linenums">&lt;div id="divLogo"&gt;
      &lt;a href="index.html" id="divSiteTitle"&gt;Your Site Name&lt;/a&gt;
      &lt;a href="index.html" id="divTagLine"&gt;Your Tag Line Here&lt;/a&gt;
    &lt;/div&gt;</pre>

              <p>You need to type in your site name and tag line.</p>

              <hr class="bs-docs-separator">

              <h2>Inserting your own Logo</h2>

              <p>If you wish to use your own Logo, make sure that that it does not exceed more than 350 pixels wide and 70 pixels in height.  Replace the existing logo code for the following new code if you wish to use your own logo:</p>

    <pre class="prettyprint linenums">&lt;div id="divLogo" class="pull-left"&gt;
      &lt;a href="index.html" id="divSiteTitle"&gt;&lt;img src="images/logo.png" alt="Site Name" title="Site Name" /&gt;&lt;/a&gt;
    &lt;/div&gt;</pre>

              <p><span class="label label-important">Note</span> Ensure that your code points to the correct path of your logo's location, i.e. in your <strong>'/images'</strong> folder.</p>


          </section>


          <hr class="bs-docs-separator">


          <section id="menusettings">


              <h1>Top Navigation Menu Settings</h1>

              <p>The Menu Container can be found in the Menu Container - <code>#divMenuRight</code></p>

    <pre class="prettyprint linenums">&lt;div id="divMenuRight" class="pull-right"&gt;
      &lt;div class="navbar"&gt;
      &lt;button type="button" class="btn btn-navbar-highlight btn-large btn-primary" data-toggle="collapse" data-target=".nav-collapse"&gt;
      NAVIGATION &lt;span class="icon-chevron-down icon-white"&gt;&lt;/span&gt;
      &lt;/button&gt;
             &lt;div class="nav-collapse collapse"&gt;
             &lt;ul class="nav nav-pills ddmenu"&gt;
             &lt;li class="active"&gt;&lt;a href="index.html"&gt;Home&lt;/a&gt;&lt;/li&gt;
             &lt;li&gt;&lt;a href="about.html"&gt;About&lt;/a&gt;&lt;/li&gt;
         &lt;li class="dropdown"&gt;
             &lt;a href="page.html" class="dropdown-toggle"&gt;Page &lt;b class="caret"&gt;&lt;/b&gt;&lt;/a&gt;
             &lt;ul class="dropdown-menu"&gt;
             &lt;li class="dropdown"&gt;
             &lt;a href="#" class="dropdown-toggle"&gt;Dropdown Item &nbsp;&raquo;&lt;/a&gt;
             &lt;ul class="dropdown-menu sub-menu"&gt;
             &lt;li&gt;&lt;a href="#"&gt;Dropdown Item&lt;/a&gt;&lt;/li&gt;
             &lt;li&gt;&lt;a href="#"&gt;Dropdown Item&lt;/a&gt;&lt;/li&gt;
             &lt;li&gt;&lt;a href="#"&gt;Dropdown Item&lt;/a&gt;&lt;/li&gt;
             &lt;/ul&gt;
             &lt;/li&gt;
             &lt;li&gt;&lt;a href="full.html"&gt;Full Page&lt;/a&gt;&lt;/li&gt;
             &lt;li&gt;&lt;a href="2-column.html"&gt;Two Column&lt;/a&gt;&lt;/li&gt;
             &lt;li&gt;&lt;a href="3-column.html"&gt;Three Column&lt;/a&gt;&lt;/li&gt;
             &lt;/ul&gt;
             &lt;/li&gt;
         &lt;li&gt;&lt;a href="services.html"&gt;Services&lt;/a&gt;&lt;/li&gt;
         &lt;li&gt;&lt;a href="portfolio.html"&gt;Portfolio&lt;/a&gt;&lt;/li&gt;
         &lt;li&gt;&lt;a href="contact.php"&gt;Contact&lt;/a&gt;&lt;/li&gt;
             &lt;/ul&gt;
             &lt;/div&gt;
      </pre>


          </section>


          <hr class="bs-docs-separator">


          <section id="header">


              <h1>Editing Header Image and Captions</h1>

              <p>The code for the header can be found in the Container - <code>#divPanel headerArea</code></p>

    <pre class="prettyprint linenums">&lt;div class="divPanel headerArea"&gt;
          &lt;div class="row-fluid"&gt;
               &lt;div class="span12"&gt;
                      &lt;div id="headerSeparator">&lt;/div&gt;
                      &lt;div id="divHeaderText" class="page-content"&gt;
                      &lt;div id="divHeaderLine1">Your Header Text Here!&lt;/div>&lt;br /&gt;
                      &lt;div id="divHeaderLine2">2nd line header text for calling extra attention to featured content..                    &lt;/div>&lt;br /&gt;
                      &lt;div id="divHeaderLine3"&gt;&lt;a class="btn btn-large btn-primary" href="#">Read More&lt;/a&gt;&lt;/div&gt;
                      &lt;/div&gt;
           &lt;div id="headerSeparator2">&lt;/div&gt;
              &lt;/div&gt;
           &lt;/div&gt;

      &lt;/div&gt;</pre>

      <p>To replace the header image for your own ensure that the dimensions are 1280 pixels wide and at least 450 pixels in height.  Place the header image in the folder named <strong>'styles/'.</strong>

      <p>To edit the text for the captions, just edit the text in the code as shown above.</p>

      <p>To delete the header image captions, delete the code for <code>#divHeaderLine1</code>, <code>#divHeaderLine2</code>, <code>#divHeaderLine3</code> and add 7 breaklines.</p>

      <p>The code should now be as:</p>

    <pre class="prettyprint linenums">&lt;div class="divPanel headerArea"&gt;
          &lt;div class="row-fluid"&gt;
               &lt;div class="span12"&gt;
                      &lt;div id="headerSeparator">&lt;/div&gt;
                      &lt;div id="divHeaderText" class="page-content"&gt;
                      &lt;/br&gt;&lt;/br&gt;&lt;/br&gt;&lt;/br&gt;&lt;/br&gt;&lt;/br&gt;&lt;/br&gt;
           &lt;div id="headerSeparator2">&lt;/div&gt;
              &lt;/div&gt;
           &lt;/div&gt;

      &lt;/div&gt;</pre>

          </section>


          <hr class="bs-docs-separator">


          <section id="footersettings">


              <h1>Footer Settings</h1>

             <p>All the Footer content to edit is enclosed in <code>#divFooter</code></p>

    <pre class="prettyprint linenums">&lt;div id="divFooter" class="footerArea"&gt;
      ...
    &lt;/div&gt;</pre>

          </section>


          <hr class="bs-docs-separator">


          <section id="backgroundsettings">


              <h1>Background Settings</h1>

             <p>The background color or image for the footer area can easily be changed by editing a style in the file named :<code>styles/custom.css</code></p>

             <p>For the <strong>Footer layout background</strong> open the custom.css file in Dreamweaver (code view) or Notepad++. Goto line 279 and change the RGB value for the background color.  If you wish to add a background pattern instead of a color, just specify the URL of your image in place of 'none' for the 'background-image' element, i.e. <code>background-image: url(tactile_noise.png);</code>.</p>
             <p>The background images should be in the same folder as your custom.css file i.e. in the <strong>'styles' folder.</strong></p>

    <pre class="prettyprint linenums">#divFooter{
      border-bottom-left-radius: 0px;
      border-bottom-right-radius: 0px;
      background-color: rgb(122, 12, 12);
      color: rgb(211, 211, 211);
      font-family: Actor, sans-serif;
      text-transform: none;
      font-size: 12px;
      letter-spacing: 0px;
      line-height: 22px;
      background-image: none;
      background-repeat: repeat repeat;
    }</pre>

             A good source of backgrounds is the site  <a href="http://subtlepatterns.com/">subtlepatterns.com</a>

          </section>


          <hr class="bs-docs-separator">



    <section id="carousalsettings">


              <h1>Editing Carousel</h1>

              <p>To edit the carousel on the 'index.html' homepage, content should be edited in the div class - <code>#list_carousel responsive</code>.</p>
              <p>You can add as many thumbnails as you require in the carousal. You can then link to either a lightbox preview or a separate page altogether.  The carousal is a good place to list your clients or sample work.</p>
              <p>The thumbnail sizes are 320 pixels wide by 150 pixels in height.  Place your carousel images in the folder named <strong>'images/'.</strong></p>
              <p>Here's the sample code below to edit:</p>

    <pre class="prettyprint linenums">
    &lt;div class="list_carousel responsive"&gt;
      &lt;ul id="list_photos"&gt;
          &lt;li&gt;&lt;img src="images/carmel.jpg" class="img-polaroid"&gt;&lt;/li&gt;
          &lt;li&gt;&lt;img src="images/rula-sibai-pink-flowers.jpg" class="img-polaroid"&gt;&lt;/li&gt;
          &lt;li&gt;&lt;img src="images/girl-flowers.jpg" class="img-polaroid"&gt;&lt;/li&gt;
          &lt;li&gt;&lt;img src="images/night-city.jpg" class="img-polaroid"&gt;&lt;/li&gt;
      &lt;li&gt;&lt;img src="images/irish-hands.jpg" class="img-polaroid"&gt;&lt;/li&gt;
          &lt;li&gt;&lt;img src="images/Top_view.jpg" class="img-polaroid"&gt;&lt;/li&gt;
          &lt;li&gt;&lt;img src="images/vectorbeastcom-grass-sun.jpg" class="img-polaroid"&gt;&lt;/li&gt;
          &lt;li&gt;&lt;img src="images/sunset-hair.jpg" class="img-polaroid"&gt;&lt;/li&gt;
      &lt;li&gt;&lt;img src="images/stones-hi-res.jpg" class="img-polaroid"&gt;&lt;/li&gt;
      &lt;li&gt;&lt;img src="images/salzburg-x.jpg" class="img-polaroid"&gt;&lt;/li&gt;
      &lt;/ul&gt;
    &lt;/div&gt;
          </pre>


          </section>


    <hr class="bs-docs-separator">


    <section id="portfoliosettings">


              <h1>Editing 'Gallery' page</h1>

              <p>To edit the gallery thumbnails and the large previews content should be edited in the div class - <code>#gridArea</code>. From line 109 to 236.</p>
              <p>The thumbnail sizes are 350 pixels wide by 263 pixels in height.  Place your thumbnail images in the folder named <strong>'styles/thumbs/'.</strong></p>
              <p>The large previews linked to the thumbnails must also be placed in the same <strong>'styles/thumbs/'</strong> folder.  These larger prviews can be any size.  Try and match the name similar to the associated thumbnail, e.g, thumbnail name could be 'holiday-paris.jpg' and the large preview for this thumbnail could be named as 'holiday-paris-large.jpg'.</p>
              <p>Make sure that the code for the thumbnails and large previews follow the correct path to the <strong>'styles/thumbs/'</strong> folder. Here's the sample code below to edit.</p>

    <pre class="prettyprint linenums">
    &lt;li&gt;
    &lt;a href="styles/thumbs/sticky_800.jpg" title="Sticky" rel="prettyPhoto[gallery1]"&gt;&lt;img src="styles/thumbs/sticky_350.jpg" alt="Sticky" title="Sticky"/&gt;&lt;/a&gt;
    &lt;div class="meta"&gt;&lt;span&gt;7 minutes ago&lt;/span&gt;&lt;span class="pull-right"&gt;By Bob&lt;/span&gt;&lt;/div&gt;
    &lt;h4&gt;&lt;a href="#"&gt;New photo&lt;/a&gt;&lt;/h4&gt;
    &lt;p&gt;A sample photo with short description. Lorem Ipsum is simply dummy text of the printing and typesetting industry.&lt;/p&gt;
    &lt;/li&gt;&lt;/pre&gt;


          </section>


    <hr class="bs-docs-separator">

    <section id="colorsettings">


              <h1>Emphasis Classes</h1>

              <p>Convey meaning through color with a handful of emphasis utility classes.</p>
              <div class="bs-docs-example">
              <p class="muted">Fusce dapibus, tellus ac cursus commodo, tortor mauris nibh.</p>
              <p class="text-warning">Etiam porta sem malesuada magna mollis euismod.</p>
              <p class="text-error">Donec ullamcorper nulla non metus auctor fringilla.</p>
              <p class="text-info">Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis.</p>
              <p class="text-success">Duis mollis, est non commodo luctus, nisi erat porttitor ligula.</p>
              </div>
              <pre class="prettyprint linenums">
    &lt;p class="muted"&gt;Fusce dapibus, tellus ac cursus commodo, tortor mauris nibh.&lt;/p&gt;
    &lt;p class="text-warning"&gt;Etiam porta sem malesuada magna mollis euismod.&lt;/p&gt;
    &lt;p class="text-error"&gt;Donec ullamcorper nulla non metus auctor fringilla.&lt;/p&gt;
    &lt;p class="text-info"&gt;Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis.&lt;/p&gt;
    &lt;p class="text-success"&gt;Duis mollis, est non commodo luctus, nisi erat porttitor ligula.&lt;/p&gt;
    </pre>

    </section>


    <hr class="bs-docs-separator">

    <section id="contactsettings">


              <h1>Setting up Bootstrap Contact Form page</h1>

              <p>To configure the Bootstrap contact form on the contact page to send the form query to your specified email address just open the file named <strong>'index.php'</strong> located in the folder named <strong>'email/'</strong> and edit line 8, by replacing the default email address for your own.</p>

    <pre class="prettyprint linenums">
    $to="your-email@your-domain.com";</pre>

    Your webhost must support PHP in order for the form to work. PHP features are usually on Linux servers.  If your hosting is not on Linux, request your host to change to it.  Your Webhost should not charge you for the changeover.

    </section>


    <hr class="bs-docs-separator">

    <section id="ftpsettings">


              <h1>Uploading your files to your remote server</h1>

              <p>Once you have completed your site. Upload all the files and folders from your main <strong>'site/'</strong> folder to the <strong>'public/'</strong> directory of your remote server. This <strong>'public/'</strong> folder is the your root site folder where your default placeholder index.html file is held.  When uploading you will get a prompt to ovewrite the exising default index.html file, click o'kay to overwrite it with the new one.</p>

              <p>We recommend using <a href="https://filezilla-project.org/download.php?type=client">Filezilla</a> to upload your files.  It is fast and easy to use.</p> You will need to use your FTP Host Name, Username and Password to logon using Filezilla.  This information is sent to you when you first signup with a webhosting package.  In case you don't know it, you can always request it from your webhost again.</p>

              <p class="text-error">Do not upload the folder named 'documentation/'.</p>


    </section>


    <hr class="bs-docs-separator">

    <section id="thirdpartysettings">


              <h1>Using third party scripts</h1>

              <p>You can use any third party scripts to enhance overall user experience, such as image preloaders, calendars, search scripts, animations, shopping carts, Html5 video players, hover effects etc...</p>

              <p>We thoroughly recommend scripts from <a href="http://codecanyon.net/?ref=WA6">CodeCanyon</a>.</p>



    </section>

            <div id="footerInnerSeparator"></div>
        </div>
      </div>

    </div>


      <div id="footerOuterSeparator"></div>
      <!-- Footer
      ================================================== -->
      <div id="divFooter" class="footerArea">

          <div class="container">

              <div class="divPanel">

                  <div class="row-fluid">
                      <div class="span3" id="footerArea1">

                          <h3>À Propos</h3>
                          <p>
                              <a href="#" title="Terms of Use">Termes et Conditions d'utilisation</a><br />
                              <a href="#" title="Privacy Policy">Vie privée</a><br />
                              <a href="#" title="Sitemap">plan d'accès</a>
                          </p>

                      </div>
                      <div class="span3" id="footerArea2">

                          <a href="recherche"><h3>Recherche</h3></a>
                      </div>
                      <div class="span3" id="footerArea3">
                          <a href="#"><h3>Fonctionnement</h3></a>
                      </div>
                      <div class="span3" id="footerArea4">

                          <h3>Nous contacter </h3>
                          <ul id="contact-info">
                              <li>
                                  <i class="general foundicon-phone icon"></i>
                                  <span class="field">Téléphone:</span>
                                  <br >
                                  (+32) 479798123
                              </li>
                              <li>
                                  <i class="general foundicon-mail icon"></i>
                                  <span class="field">Email:</span>
                                  <br />
                                  <a href="mailto:contact@easywaitingroom.be" title="Email">contact@easywaitingroom.be</a>
                              </li>
                              <li>
                                  <i class="general foundicon-home icon" style="margin-bottom:50px"></i>
                                  <span class="field">Adresse:</span>
                                  <br />
                                  Avenue du Ciseau, 15<br />
                                  1348, Ottignies-Louvain-la-Neuve<br />
                                  Belgique
                              </li>
                          </ul>

                      </div>
                  </div>

                  <br /><br />
                  <div class="row-fluid">
                      <div class="span12">
                          <p class="copyright">
                              Copyright © 2016 EasyWaitingRoom. Tous droits réservés .
                          </p>

                          <p class="social_bookmarks">
                              <a href="#"><i class="social foundicon-facebook"></i> Facebook</a>
                              <a href=""><i class="social foundicon-twitter"></i> Twitter</a>
                              <a href="#"><i class="social foundicon-pinterest"></i> Pinterest</a>
                              <a href="#"><i class="social foundicon-rss"></i> Rss</a>
                          </p>
                      </div>
                  </div>
                  <br />

              </div>

          </div>

      </div>



      <!-- Le javascript
      ================================================== -->
      <!-- Placed at the end of the document so the pages load faster -->
      <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
      <script src="assets/js/jquery.js"></script>
      <script src="assets/js/bootstrap-transition.js"></script>
      <script src="assets/js/bootstrap-alert.js"></script>
      <script src="assets/js/bootstrap-modal.js"></script>
      <script src="assets/js/bootstrap-dropdown.js"></script>
      <script src="assets/js/bootstrap-scrollspy.js"></script>
      <script src="assets/js/bootstrap-tab.js"></script>
      <script src="assets/js/bootstrap-tooltip.js"></script>
      <script src="assets/js/bootstrap-popover.js"></script>
      <script src="assets/js/bootstrap-button.js"></script>
      <script src="assets/js/bootstrap-collapse.js"></script>
      <script src="assets/js/bootstrap-carousel.js"></script>
      <script src="assets/js/bootstrap-typeahead.js"></script>
      <script src="assets/js/bootstrap-affix.js"></script>

      <script src="assets/js/holder/holder.js"></script>
      <script src="assets/js/google-code-prettify/prettify.js"></script>

      <script src="assets/js/application.js"></script>


</body>
</html>
