<?php
    $page_title='Doctors\' Management Service, Inc. | Careers';
    include ('inc/header.inc');
    include ('inc/topNav.inc');
?>
<style type="text/css">
    input[onblur]{
        color:#999999;
    }
</style>
<div id="screenContainer">
    <div id="content">
        <div id="companyTest">
            <p class="pageIntro">Our clients will tell you you know how we bring them an increase in pay, organization, and peace of mind.</p>
            <p class="testimonial"><span class="ldquo"></span><a href="testimonials.php#NCorreia">Due to Tim&rsquo;s diligence in overseeing the company's activities, I consider DMS as the ideal client &hellip;</a><span class="rdquo"></span></p>
        </div>
        <div id="pageContentStandard">
            <h1>careers</h1>
            <p>Thank you for your interest in starting a career with Doctors' Management Service. We have several departments and the ability to move upwards into supervisory and management positions. To save you time during the interview process, we created this online submission form. Please take the time to completely fill out this form, which we will review during your interview.</p>
            <p>
            <?php
            if(isset($_POST['inquirySubmit'])){
                $message='<div class="invalid">The following errors occurred:<br />';
                $problem=FALSE;
                if(!eregi("^[[:alpha:].'-]{4,}$", stripslashes(trim($_POST['First'])))){
                    $problem=TRUE;
                    $message.='<p>Please enter a valid first name.</p>';
                }
                
                if(!eregi("^[[:alpha:].'-]{4,}$", stripslashes(trim($_POST['Last'])))){
                    $problem=TRUE;
                    $message.='<p>Please enter a valid last name.</p>';
                }
                if (!preg_match("/^[[:alnum:]][a-zA-Z0-9_\.\#\' \-]{2,60}$/", stripslashes(trim($_POST['Add'])))) {
                    $problem=TRUE;
                    $message.='<p>Please enter a valid home address.</p>';
                }
                if (!preg_match("/^[[:alnum:]][a-zA-Z0-9_\.\#\' \-]{2,60}$/", stripslashes(trim($_POST['City'])))) {
                    $problem=TRUE;
                    $message.='<p>Please enter a valid city.</p>';
                }
                if (!preg_match("/^(A[LKSZRAP]|C[AOT]|D[EC]|F[LM]|G[AU]|HI|I[ADL N]|K[SY]|LA|M[ADEHINOPST]|N[CDEHJMVY]|O[HKR]|P[ARW]|RI|S[CD] |T[NX]|UT|V[AIT]|W[AIVY])$/", stripslashes(trim($_POST['State'])))) {
                    $problem=TRUE;
                    $message.='<p>Please enter a state abbreviation.</p>';
                }
                if (!preg_match("/^[0-9]{5,5}([- ]?[0-9]{4,4})?$/", stripslashes(trim($_POST['Zip'])))) {
                    $problem=TRUE;
                    $message.='<p>Please enter a zip code.</p>';
                }
                if(!eregi("^[[:alnum:]][a-z0-9_.-}*@[a-z0-9.-]+\.[a-z]{2,4}$", stripslashes(trim($_POST['Email'])))){
                    $problem=TRUE;
                    $message.='<p>Please enter a valid email address.</p>';
                }
                if(isset($_POST['g-recaptcha-response'])){
                  $captcha=$_POST['g-recaptcha-response'];
                }
                $captcha;
                $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LeP180SAAAAALIfjYJ4l9AB6O7L_iVSv1orh6Eg&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
                if($response.success==false){
                    $problem=TRUE;
                    $message.='<p>Please check the the captcha form.</p>';
                }
                if(!$problem){
                    
                        echo '<h2>Thank you for contacting DMS. You will be contacted by an agent shortly.</h2>';
                        
                    $firstname = $_POST['First'];
                    $lastname = $_POST['Last'];
                    $homeaddress = $_POST['Add'];
                    $email = $_POST['Email'];
                    $city = $_POST['City'];
                    $state = $_POST['State'];
                    $zip = $_POST['Zip'];
                    $phone = $_POST['Phone'];

                    $employed = $_POST['Employed'];
                    $currentpos = $_POST['CurrPos'];
                    $applied = $_POST['Applied'];
                    $workdate = $_POST['Begin_Work_Date'];

                    $employ1 = $_POST['Employ1'];
                    $pos1 = $_POST['Pos1'];
                    $sal1 = $_POST['Sal1'];
                    $leave1 = $_POST['Leave1'];

                    $employ2 = $_POST['Employ2'];
                    $pos2 = $_POST['Pos2'];
                    $sal2 = $_POST['Sal2'];
                    $leave2 = $_POST['Leave2'];

                    $employ3 = $_POST['Employ3'];
                    $pos3 = $_POST['Pos3'];
                    $sal3 = $_POST['Sal3'];
                    $leave3 = $_POST['Leave3'];

                    $highschool = $_POST['Highschool'];
                    $highschoolgrad = $_POST['Highschool_Grad'];
                    $highschoolMaj = $_POST['Highschool_Maj'];
                    $certificatename = $_POST['Certificate'];
                    $certificategrad = $_POST['Certificate_Name'];
                    $certificateMaj = $_POST['Certificate_Maj'];
                    $collegename = $_POST['College'];
                    $collegegrad = $_POST['College_Grad'];
                    $collegeMaj = $_POST['College_Maj'];
                    
                    $to = 'tim@doctorsmanagementservice.org';
                    
                    $body = "<h1>Application</h1>";
                    
                    foreach ($_POST as $post_field => $post_value){
                        $body .= "<p>" . $post_field . ": " . $post_value . "</p>";
                    }
                    
                    $headers = array("From: tim@doctorsmanagementservice.org", "Content-Type: text/html");
                    mail ($to, 'Application', $body, implode("\r\n", $headers));
                    
                } else {
                        echo $message;
                        echo '</div>';
                }
            }
            ?>
                            
                            
                            
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    
                    <fieldset>
                    <h2>PERSONAL INFORMATION</h2>
                    <div style="float:left;margin-right:.25em;"><label for="First">*First Name:</label><br />
                                        <input name="First" type="text" id="name" size="40" value="<?php if (isset($_POST['First'])) echo $_POST['First']; ?>"></div>
                    
                    <div><label for="Last">*Last Name:</label><br />
                                        <input name="Last" type="text" id="name" size="40" value="<?php if (isset($_POST['Last'])) echo $_POST['Last']; ?>"></div>
                                        <div style="clear:both;"></div>
                    <div style="float:left;margin-right:.25em;"><label for="Add">*Home Address:</label><br />
                                        <input name="Add" type="text" id="home" size="40" value="<?php if (isset($_POST['Add'])) echo $_POST['Add']; ?>"></div>

                    <div><label for="Email">*Email:</label><br />
                                        <input name="Email" type="text" id="email" size="40" value="<?php if (isset($_POST['Email'])) echo $_POST['Email']; ?>"></div>
                                        <div style="clear:both;"></div>
                    <div style="float:left;margin-right:.25em;"><label for="City">*City:</label><br />
                                        <input name="City" type="text" id="city" size="40" value="<?php if (isset($_POST['City'])) echo $_POST['City']; ?>"></div>

                    <div><label for="State">*State:</label><br />
                                        <input name="State" type="text" id="state" size="40" value="<?php if (isset($_POST['State'])) echo $_POST['State']; ?>"></div>
                                        <div style="clear:both;"></div>
                    <div style="float:left;margin-right:.25em;"><label for="Zip">*Zip Code:</label><br />
                                        <input name="Zip" type="text" id="zip" size="40" value="<?php if (isset($_POST['Zip'])) echo $_POST['Zip']; ?>"></div>
                    
                    <div><label for="Phone">Phone (xxx-xxx-xxxx)(<span class="caption">optional</span>):</label><br />
                                        <input name="Phone" type="text" id="phone" size="40" value="<?php if (isset($_POST['Phone'])) echo $_POST['Phone']; ?>"></div>
                                        <div style="clear:both;"></div>

                    <!-- ========================================= -->

                    <h2>EMPLOYMENT</h2>
                    <div style="float:left;margin-right:.25em;"><h3>Currently Employed?</h3>
                                        <input type="radio" name="Employed" value="yes">Yes&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="radio" name="Employed" value="no">No<br>
                                        <h3>If 'Yes', current position?</h3>
                                        <input name="CurrPos" type="text" id="CurrPos" size="40" value="<?php if (isset($_POST['CurrPos'])) echo $_POST['CurrPos']; ?>"></div>
                    <div style="float:right;"><h3>Have you applied here before?</h3>
                                        <input type="radio" name="Applied" value="yes">Yes&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="radio" name="Applied" value="no">No<br>
                                        <h3>Date you can begin working here.</h3>
                                        <input name="Begin_Work_Date" type="text" id="Begin_Work_Date" size="40" value="<?php if (isset($_POST['Begin_Work_Date'])) echo $_POST['Begin_Work_Date']; ?>"></div>
                                        <div style="clear:both;"></div>
                    <h2>PREVIOUS EMPLOYMENT</h2>
                    <div style="float:left;margin-right:.25em"><label style="padding:0;" for="Employ1">Employer 1</label><br />
                                        <input name="Employ1" type="text" id="Employ1" size="40" value="<?php if (isset($_POST['Employ1'])) echo $_POST['Employ1']; ?>"><br />
                    
                                        <label style="padding:0;" for="Loc1">Location 1</label><br />
                                        <input name="Loc1" type="text" id="Loc1" size="40" value="<?php if (isset($_POST['Loc1'])) echo $_POST['Loc1']; ?>"></div>

                    <div style="float:left;margin-right:.25em"><label style="padding:0;" for="Sal1">Salary 1</label><br />
                                        <input name="Sal1" type="text" id="Sal1" size="40" value="<?php if (isset($_POST['Sal1'])) echo $_POST['Sal1']; ?>"><br />
                    
                                        <label style="padding:0;" for="Pos1">Position 1</label><br />
                                        <input name="Pos1" type="text" id="Pos1" size="40" value="<?php if (isset($_POST['Pos1'])) echo $_POST['Pos1']; ?>"></div><div style="clear:both;"></div>
                    <label style="padding:0;" for="Leave1">Reason for leaving (short answer please / -25 characters)</label><br />
                    <textarea rows="4" cols="50" maxlength="25" name="Leave1" type="text" id="Leave1"></textarea>
                    <hr>
                    <div style="float:left;margin-right:.25em;"><label style="padding:0;" for="Employ2">Employer 2</label><br />
                                        <input name="Employ2" type="text" id="Employ2" size="40" value="<?php if (isset($_POST['Employ2'])) echo $_POST['Employ2']; ?>"><br />
                    
                                        <label style="padding:0;" for="Loc2">Location 2</label><br />
                                        <input name="Loc2" type="text" id="Loc2" size="40" value="<?php if (isset($_POST['Loc2'])) echo $_POST['Loc2']; ?>"></div>

                    <div style="float:left;margin-right:.25em;"><label style="padding:0;" for="Sal2">Salary 2</label><br />
                                        <input name="Sal2" type="text" id="Sal2" size="40" value="<?php if (isset($_POST['Sal2'])) echo $_POST['Sal2']; ?>"><br />
                    
                                        <label style="padding:0;" for="Pos2">Position 2</label><br />
                                        <input name="Pos2" type="text" id="Pos2" size="40" value="<?php if (isset($_POST['Pos2'])) echo $_POST['Pos2']; ?>"></div>
                                        <div style="clear:both;"></div>
                    <label style="padding:0;" for="Leave2">Reason for leaving (short answer please / -25 characters)</label><br />
                    <textarea rows="4" cols="50" maxlength="25" name="Leave2" type="text" id="Leave2"></textarea>
                    <hr>
                    <div style="float:left;margin-right:.25em;"><label style="padding:0;" for="Employ3">Employer 3</label><br />
                                        <input name="Employ3" type="text" id="Employ3" size="40" value="<?php if (isset($_POST['Employ3'])) echo $_POST['Employ3']; ?>"><br />
                    
                                        <label style="padding:0;" for="Loc3">Location 3</label><br />
                                        <input name="Loc3" type="text" id="Loc3" size="40" value="<?php if (isset($_POST['Loc3'])) echo $_POST['Loc3']; ?>"></div>

                    <div style="float:left;margin-right:.25em;"><label style="padding:0;" for="Sal3">Salary 3</label><br />
                                        <input name="Sal3" type="text" id="Sal3" size="40" value="<?php if (isset($_POST['Sal3'])) echo $_POST['Sal3']; ?>"><br />
                    
                                        <label style="padding:0;" for="Pos3">Position 3</label><br />
                                        <input name="Pos3" type="text" id="Pos3" size="40" value="<?php if (isset($_POST['Pos3'])) echo $_POST['Pos3']; ?>"></div>
                                        <div style="clear:both;"></div>
                    <label style="padding:0;" for="Leave3">Reason for leaving (short answer please / -25 characters)</label><br />
                    <textarea rows="4" cols="50" maxlength="25" name="Leave3" type="text" id="Leave3"></textarea>

                    <h2>EDUCATION</h2>
                    <div style="float:left;margin-right:.25em;"><h3>Highschool Name</h3>
                                        <input name="Highschool" type="text" id="Highschool" size="40" value="<?php if (isset($_POST['Highschool Name'])) echo $_POST['Highschool Name']; ?>"></div>
                    <div style="float:left;margin-right:.25em;"><h3>Highschool Major</h3>
                                        <input name="Highschool_Maj" type="text" id="Highschool_Maj" size="40" value="<?php if (isset($_POST['Highschool Major'])) echo $_POST['Highschool Major']; ?>"></div>
                    <div style="float:right;"><h3>Graduated?</h3>
                                        <input type="radio" name="Highschool_Grad" value="yes">Yes&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="radio" name="Highschool_Grad" value="no">No</div>
                                        <div style="clear:both;"></div>
                                        <hr>
                    <div style="float:left;margin-right:.25em;"><h3>Certificate Name</h3>
                                        <input name="Certificate" type="text" id="Certificate" size="40" value="<?php if (isset($_POST['Certificate Name'])) echo $_POST['Certificate Name']; ?>"></div>
                    <div style="float:left;margin-right:.25em;"><h3>Certificate Major</h3>
                                        <input name="Certificate_Maj" type="text" id="Certificate_Maj" size="40" value="<?php if (isset($_POST['Certificate Major'])) echo $_POST['Certificate Major']; ?>"></div>
                    <div style="float:right;"><h3>Graduated?</h3>
                                        <input type="radio" name="Certificate_Grad" value="yes">Yes&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="radio" name="Certificate_Grad" value="no">No</div>
                                        <div style="clear:both;"></div>
                                        <hr>
                    <div style="float:left;margin-right:.25em;"><h3>College Name</h3>
                                        <input name="College" type="text" id="College" size="40" value="<?php if (isset($_POST['College Name'])) echo $_POST['College Name']; ?>"></div>
                    <div style="float:left;margin-right:.25em;"><h3>College Major</h3>
                                        <input name="College_Maj" type="text" id="College_Maj" size="40" value="<?php if (isset($_POST['College Major'])) echo $_POST['College Major']; ?>"></div>
                    <div style="float:right;"><h3>Graduated?</h3>
                                        <input type="radio" name="College_Grad" value="yes">Yes&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="radio" name="College_Grad" value="no">No</div>
                                        <div style="clear:both;">
                    <br><br>
                    <input type="submit" name="inquirySubmit" value="Submit">
                    <input type="reset" name="reset" value="Clear">
                    <div class="g-recaptcha" data-sitekey="6LeP180SAAAAAOTJGquFGfAZrqExZ1S1Kj7O79pT"></div>
                    </fieldset>
            </form>
        </p>
    </div>
<?php
    include ('inc/sideBar.inc');
 include ('inc/footerCareers.inc');
 ?></body></html>