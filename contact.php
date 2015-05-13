<?php
    $page_title='Doctors\' Management Service, Inc. | Careers';
    include ('inc/header.inc');
 ?>
<?php
    include ('inc/topNav-contact.inc');
?>
<div id="screenContainer">
    <div id="content">
        <div id="contactTest">
            <p class="pageIntro">Even now, it is uncommon for billing companies to provide such a service.</p>
            <p class="testimonial"><span class="ldquo"></span><a href="testimonials.php#NCorreia">Due to Tim&rsquo;s diligence in overseeing the company's activities, I consider DMS as the ideal client &hellip;</a><span class="rdquo"></span></p>
        </div>
        <div id="pageContentStandard">
        <div id="staffGeneral">
        <img src="images/DMS041512.jpg" width="500" height="275" alt="dms" />
        <ul style="list-style:none;line-height:200%;">
        <li>Doctors' Management Services</li><li>944 Washington St.,Suite 1</li><li>South Easton, MA 02375</li><li>tim@doctorsmanagementservice.org</li><li>Phone: 508.238.8646</li><li>Fax: 508.230.9772</li></ul>
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2963.8107550242175!2d-71.067471!3d42.025791999999996!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd20d870f53e79cb1!2sDoctor&#39;s+Management+Services+Inc!5e0!3m2!1sen!2sus!4v1398217693446" width="275" height="275" style="width:275px !important;height:275px !important;" frameborder="0" style="border:0"></iframe>
        </div>
        <div id="staffMembers">
            <h1>contact us</h1>
            <p>To learn more about our services please call 508.238.8646 or fill out the form below. Thank you.</p>
            <p>
<?php
                    
                                if(isset($_POST['inquirySubmit']))
                                    {
                                    $message='<div class="invalid">The following errors occurred:<br />';
                                    $problem=FALSE;
                                
                                if(!preg_match("/^[[:alpha:].'-]{4,}$/", stripslashes(trim($_POST['First_Name'])))){
                                    $problem=TRUE;
                                    $message.='<p>Please enter a valid first name.</p>';
                                }
                                
                                if(!preg_match("/^[[:alpha:].'-]{4,}$/", stripslashes(trim($_POST['Last_Name'])))){
                                    $problem=TRUE;
                                    $message.='<p>Please enter a valid last name.</p>';
                                }
                                
                                if(!preg_match("/^[[:alnum:]][a-z0-9_.-}*@[a-z0-9.-]+\.[a-z]{2,4}$/", stripslashes(trim($_POST['Email'])))){
                                    $problem=TRUE;
                                    $message.='<p>Please enter a valid email address.</p>';
                                }
                                
                                if(!$problem){
                                    
                                        echo '<h2>Thank you for contacting DMS. You will be contacted by an agent shortly.</h2>';
                                        
                                    $firstname = $_POST['First_Name'];
                                    $lastname = $_POST['Last_Name'];
                                    $email = $_POST['Email'];
                                    $phone = $_POST['Phone'];
                                    $specialty = $_POST['Specialty'];
                                    $practice = $_POST['Practice'];
                                    $details = $_POST['Details'];
                                    
                                    $to = 'nelson@ncdesigns-studio.com';
                                    
                                    $body = "<h1 style='color: #005F5F'>USER SUBMITTED INFORMATION @ DMS</h1>";
                                    
                                    foreach ($_POST as $post_field => $post_value){
                                        $body .= "<p style='font: normal bold 12px/135% san-serif'>" . $post_field . ": " . $post_value . "</p>";
                                    }
                                    
                                    $headers = array("From: tim@doctorsmanagementservice.org", "Content-Type: text/html");
                                    mail ($to, 'User Submitted Information @ DMS', $body, implode("\r\n", $headers));
                                    
                                } else {
                                        echo $message;
                                        echo '</div>';
                                }
                            }
                            ?>
                            
                            
                            
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                            
                            <fieldset>
                            <label for="First_Name">*First Name:</label><br />
                            <input name="First_Name" type="text" id="name" size="40" value="<?php if (isset($_POST['First_Name'])) echo $_POST['First_Name']; ?>"><br />
                            
                            <label for="Last_Name">*Last Name:</label><br />
                            <input name="Last_Name" type="text" id="name" size="40" value="<?php if (isset($_POST['Last_Name'])) echo $_POST['Last_Name']; ?>"><br />
                            
                            <label for="Phone">Phone (xxx-xxx-xxxx)(<span class="caption">optional</span>):</label><br />
                            <input name="Phone" type="text" id="phone" size="40" value="<?php if (isset($_POST['Phone'])) echo $_POST['Phone']; ?>"><br />
                            
                            <label for="Email">*Email:</label><br />
                            <input name="Email" type="text" id="email" size="40" value="<?php if (isset($_POST['Email'])) echo $_POST['Email']; ?>"><br />
                            
                            <label for="specialty">Specialty (<span class="caption">optional</span>):</label><br />
                            <input name="specialty" type="text" id="specialty" size="40" value="<?php if (isset($_POST['Specialty'])) echo $_POST['Specialty']; ?>"><br />
                            
                            <label for="Practice">Address of Practice (<span class="caption">optional</span>):</label><br />
                            <input name="Practice" type="text" id="Practice" size="40" value="<?php if (isset($_POST['Practice'])) echo $_POST['Practice']; ?>"><br />
                            
                            <label for="Details">Reason for Contacting (<span class="caption">optional</span>):</label><br />
                            <textarea name="Details" cols="32" id="details" value="<?php if (isset($_POST['Details'])) echo $_POST['Details']; ?>">
                            </textarea><br />
                              
                            <input type="submit" name="inquirySubmit" value="Submit">
                            <input type="reset" name="Submit2" value="Clear">
                            </fieldset>
                    </form>
            </p></div>
            <div id="pageContentConnect">
            <h2>CONNECT WITH US</h2>
            <ul style="list-style:none;line-height:200%;">
        <li><a href="http://www.salusresourcegroup.com"><img src="images/salus-twitter-logo68x30.png" class="img-social" width="68" height="30" alt="salus" /></a></li>
        <li><a href="https://www.linkedin.com/company/2453756?trk=cws-btn-overview-0-0"><img src="images/LinkedIn_Logo30px.png" class="img-social" width="30" height="25" alt="linkedin" /></a></li>
        <li><a href="https://www.facebook.com/DoctorsManagementServiceInc"><img class="img-social" src="images/f_logo.png" width="140" height="140" alt="facebook" /></a></li>
        <li><a href="https://twitter.com/DoctorsMgmtSvc"><img class="img-social" src="images/1307050985_2229.png" width="36" height="36" alt="twitter" /></a></li>
        </ul>
        </div>
            
    </div>
<?php
    include ('inc/sideBar.inc');
?>
<?php
 include ('inc/footerContact.inc');
 ?></body></html>