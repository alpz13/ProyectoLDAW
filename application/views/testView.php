<?php 
    include_once 'header.php';
    if($this->session->userdata('nombre')) {
        $nombre = $this->session->userdata('nombre');
        $nombre .= " ".$this->session->userdata('apellidoP');
        $nombre .= " ".$this->session->userdata('apellidoM');   
?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/styleJavascript.css" >
<title>Home</title>
<script>
    $(document).ready(function() {
        $('[name="question"]').hide();
        
        $("#startTest").click(function() {
            $("#instructions").slideUp('slow');
            $("#question1").slideDown('slow');
        });
        
        $('[name="buttonQuestion"').click(function() {
            ident = $(this).attr('ident');
            $('[name="question"').slideUp('slow');
            next = "question"+ident;
            $("#"+next).slideDown('slow');
        });
        
        $('[name="Save"').click(function() {
            question1 = $('[name="1DB"]:checked').attr('ident');
            question2 = $('[name="2DB"]:checked').attr('ident');            
            question3 = $('[name="3DB"]:checked').attr('ident');
            question4 = $('[name="4DB"]:checked').attr('ident');
            question5 = $('[name="5DB"]:checked').attr('ident');
            question6 = $('[name="6DB"]:checked').attr('ident');
            question7 = $('[name="7DB"]:checked').attr('ident');
            question8 = $('[name="8DB"]:checked').attr('ident');
            question9 = $('[name="9DB"]:checked').attr('ident');
            question10 = $('[name="10DB"]:checked').attr('ident');
            question11 = $('[name="11WEB"]:checked').attr('ident');
            question12 = $('[name="12WEB"]:checked').attr('ident');
            question13 = $('[name="13WEB"]:checked').attr('ident');
            question14 = $('[name="14WEB"]:checked').attr('ident');
            question15 = $('[name="15WEB"]:checked').attr('ident');
            question16 = $('[name="16WEB"]:checked').attr('ident');
            question17 = $('[name="17WEB"]:checked').attr('ident');
            question18 = $('[name="18WEB"]:checked').attr('ident');
            question19 = $('[name="19WEB"]:checked').attr('ident');
            question20 = $('[name="20WEB"]:checked').attr('ident');
            question21 = $('[name="21SECURITY"]:checked').attr('ident');
            question22 = $('[name="22SECURITY"]:checked').attr('ident');
            question23 = $('[name="23SECURITY"]:checked').attr('ident');
            question24 = $('[name="24SECURITY"]:checked').attr('ident');
            question25 = $('[name="25SECURITY"]:checked').attr('ident');
            question26 = $('[name="26SECURITY"]:checked').attr('ident');
            question27 = $('[name="27SECURITY"]:checked').attr('ident');
            question28 = $('[name="28SECURITY"]:checked').attr('ident');
            question29 = $('[name="29SECURITY"]:checked').attr('ident');
            question30 = $('[name="30SECURITY"]:checked').attr('ident');
            question31 = $('[name="31NETWORKING"]:checked').attr('ident');
            question32 = $('[name="32NETWORKING"]:checked').attr('ident');
            question33 = $('[name="33NETWORKING"]:checked').attr('ident');
            question34 = $('[name="34NETWORKING"]:checked').attr('ident');
            question35 = $('[name="35NETWORKING"]:checked').attr('ident');
            question36 = $('[name="36NETWORKING"]:checked').attr('ident');
            question37 = $('[name="37NETWORKING"]:checked').attr('ident');
            question38 = $('[name="38NETWORKING"]:checked').attr('ident');
            question39 = $('[name="39NETWORKING"]:checked').attr('ident');
            question40 = $('[name="40NETWORKING"]:checked').attr('ident');
            question41 = $('[name="41DESKTOP"]:checked').attr('ident');
            question42 = $('[name="42DESKTOP"]:checked').attr('ident');
            question43 = $('[name="43DESKTOP"]:checked').attr('ident');
            question44 = $('[name="44DESKTOP"]:checked').attr('ident');
            question45 = $('[name="45DESKTOP"]:checked').attr('ident');
            question46 = $('[name="46DESKTOP"]:checked').attr('ident');
            question47 = $('[name="47DESKTOP"]:checked').attr('ident');
            question48 = $('[name="48DESKTOP"]:checked').attr('ident');
            question49 = $('[name="49DESKTOP"]:checked').attr('ident');
            question50 = $('[name="50DESKTOP"]:checked').attr('ident');
            
            url = $("#url").val();
            user = $("#idUsuario").val();            
            
            $.post(url+"index.php/usuariosController/gradeAreas", {
                a1 : question1,
                a2 : question2,
                a3 : question3,
                a4 : question4,
                a5 : question5,
                a6 : question6,
                a7 : question7,
                a8 : question8,
                a9 : question9,
                a10 : question10,
                a11 : question11,
                a12 : question12,
                a13 : question13,
                a14 : question14,
                a15 : question15,
                a16 : question16,
                a17 : question17,
                a18 : question18,
                a19 : question19,
                a20 : question20,
                a21 : question21,
                a22 : question22,
                a23 : question23,
                a24 : question24,
                a25 : question25,
                a26 : question26,
                a27 : question27,
                a28 : question28,
                a29 : question29,
                a30 : question30,
                a31 : question31,
                a32 : question32,
                a33 : question33,
                a34 : question34,
                a35 : question35,
                a36 : question36,
                a37 : question37,
                a38 : question38,
                a39 : question39,
                a40 : question40,
                a41 : question41,
                a42 : question42,
                a43 : question43,
                a44 : question44,
                a45 : question45,
                a46 : question46,
                a47 : question47,
                a48 : question48,
                a49 : question49,
                a50 : question50,
                user: user
            }, function(data) {
                $('[name="question"').slideUp('slow');
                $("#finalMsg").html(data);
                $("#finalMsg").slideDown('slow');
            });
        });
        
    });
</script>
<body class='home'>
    <div id="tooplate_wrapper">
        <div class='menuArea'>
            <?php 
                if($this->session->userdata('tipo') == 3) {
                    include_once 'headWorker.php';
                } else {
                    include_once 'headAdmin.php';
                }
            ?>
        </div>
        <div class="principalArea">
            <div id="instructions" style="text-align: center; width: 70%; margin-left: 16%; font-size: medium;">
                <p>
                    The following test was implemented to evaluate your capabilities into different areas 
                    and competencies. Please answer honestly and be sure to save all your responses at the 
                    end of the test. <br/>
                    The test lasts approximately 20 minutes. 
                    Make sure you answer correctly, you are no longer allowed to return to a previous question<br/>
                </p>
                <br/>
                <div class="not-repeated">
        		<button type="button" id="startTest" class="btn btn-default">
                            Take the test
                        </button>
		</div>
            </div>
            <div id="finalMsg" style="text-align: center">
                
            </div>
            <div>
                <input type="hidden" id="idUsuario" value="<?php echo $user; ?>"/>
            </div>
            <!--Data Bases-->
            <div id="question1" name="question">
                <div ident1="db" ident2="1" style="font-size: 20px">
                    <strong>Question 1.</strong> <br/><br/>
                    <li>
                        What does SQL stands for?
                    </li>
                </div>
                <div>
                    <input type="radio" name="1DB" id="1DB" ident="1"/> &nbsp;Structured Query Language<br/>
                    <input type="radio" name="1DB" ident="0"/> &nbsp;Structured Question Line<br/>
                    <input type="radio" name="1DB" ident="0"/> &nbsp;Strong Question Language<br/>
                </div> <br/><br/>
                <div>
                    <input type="button" value="Next" name="buttonQuestion" ident="2"/>
                </div>
            </div>
            <div id="question2" name="question">
                <div ident1="db" ident2="2" style="font-size: 20px">
                    <strong>Question 2.</strong> <br/><br/>
                    <li>
                        Command that extracts all information from a table?
                    </li>
                </div>
                <div>
                    <input type="radio" name="2DB" ident="0"/> &nbsp;GET<br/>
                    <input type="radio" name="2DB" ident="0"/> &nbsp;OPEN<br/>
                    <input type="radio" name="2DB" ident="1"/> &nbsp;SELECT<br/>
                </div> <br/><br/>
                <div>
                    <input type="button" value="Next" name="buttonQuestion" ident="3"/>
                </div>
            </div>
            <div id="question3" name="question">
                <div ident1="db" ident2="3" style="font-size: 20px">
                    <strong>Question 3.</strong> <br/><br/>
                    <li>
                        Command that update information in a table?
                    </li>
                </div>
                <div>
                    <input type="radio" name="3DB" ident="0"/> &nbsp;SAVE AS<br/>
                    <input type="radio" name="3DB" ident="0"/> &nbsp;SAVE<br/>
                    <input type="radio" name="3DB" ident="1"/> &nbsp;UPDATE<br/>
                </div> <br/><br/>
                <div>
                    <input type="button" value="Next" name="buttonQuestion" ident="4"/>
                </div>
            </div>
            <div id="question4" name="question">
                <div ident1="db" ident2="4" style="font-size: 20px">
                    <strong>Question 4.</strong> <br/><br/>
                    <li>
                        Command to delete information?
                    </li>
                </div>
                <div>
                    <input type="radio" name="4DB" ident="1"/> &nbsp;DELETE<br/>
                    <input type="radio" name="4DB" ident="0"/> &nbsp;BLANK<br/>
                    <input type="radio" name="4DB" ident="0"/> &nbsp;REMOVE<br/>
                </div> <br/><br/>
                <div>
                    <input type="button" value="Next" name="buttonQuestion" ident="5"/>
                </div>
            </div>
            <div id="question5" name="question">
                <div ident1="db" ident2="5" style="font-size: 20px">
                    <strong>Question 5.</strong> <br/><br/>
                    <li>
                        Command that adds a registry in a table?
                    </li>
                </div>
                <div>
                    <input type="radio" name="5DB" ident="0"/> &nbsp;ADD<br/>
                    <input type="radio" name="5DB" ident="0"/> &nbsp;NEW<br/>
                    <input type="radio" name="5DB" ident="1"/> &nbsp;INSERT<br/>
                </div> <br/><br/>
                <div>
                    <input type="button" value="Next" name="buttonQuestion" ident="6"/>
                </div>
            </div>
            <div id="question6" name="question">
                <div ident1="db" ident2="6" style="font-size: 20px">
                    <strong>Question 6.</strong> <br/><br/>
                    <li>
                        Query to select a column named "lastname" from a table "Workers"?
                    </li>
                </div>
                <div>
                    <input type="radio" name="6DB" ident="0"/> &nbsp;EXTRACT lastname FROM Workers<br/>
                    <input type="radio" name="6DB" ident="0"/> &nbsp;SELECT Workers, lastname<br/>
                    <input type="radio" name="6DB" ident="1"/> &nbsp;SELECT lastname FROM Workers<br/>
                </div> <br/><br/>
                <div>
                    <input type="button" value="Next" name="buttonQuestion" ident="7"/>
                </div>
            </div>
            <div id="question7" name="question">
                <div ident1="db" ident2="7" style="font-size: 20px">
                    <strong>Question 7.</strong> <br/><br/>
                    <li>
                        Correct way to call all information from the table "Workers"?
                    </li>
                </div>
                <div>
                    <input type="radio" name="7DB" ident="1"/> &nbsp;SELECT * FROM Workers<br/>
                    <input type="radio" name="7DB" ident="0"/> &nbsp;SELECT [all] FROM Workers<br/>
                    <input type="radio" name="7DB" ident="0"/> &nbsp;SELECT Workers<br/>
                </div> <br/><br/>
                <div>
                    <input type="button" value="Next" name="buttonQuestion" ident="8"/>
                </div>
            </div>
            <div id="question8" name="question">
                <div ident1="db" ident2="8" style="font-size: 20px">
                    <strong>Question 8.</strong> <br/><br/>
                    <li>
                        Correct way to get all information from Workers table in which name is Raul?
                    </li>
                </div>
                <div>
                    <input type="radio" name="8DB" ident="0"/> &nbsp;SELECT * FROM Workers WHERE Name:'Raúl'<br/>
                    <input type="radio" name="8DB" ident="1"/> &nbsp;SELECT * FROM Workers WHERE Name='Raúl'<br/>
                    <input type="radio" name="8DB" ident="0"/> &nbsp;SELECT * FROM Worker LIKE 'Raúl'<br/>
                </div> <br/><br/>
                <div>
                    <input type="button" value="Next" name="buttonQuestion" ident="9"/>
                </div>
            </div>
            <div id="question9" name="question">
                <div ident1="db" ident2="9" style="font-size: 20px">
                    <strong>Question 9.</strong> <br/><br/>
                    <li>
                        Consult all fields from a worker which name starts with an "A"?
                    </li>
                </div>
                <div>
                    <input type="radio" name="9DB" ident="0"/> &nbsp;SELECT * FROM Workers LIKE Name='%a'<br/>
                    <input type="radio" name="9DB" ident="1"/> &nbsp;SELECT * FROM Workers WHERE Name LIKE 'a%'<br/>
                    <input type="radio" name="9DB" ident="0"/> &nbsp;SELECT * FROM Workers WHERE Name LIKE '%a'<br/>
                </div> <br/><br/>
                <div>
                    <input type="button" value="Next" name="buttonQuestion" ident="10"/>
                </div>
            </div>
            <div id="question10" name="question">
                <div ident1="db" ident2="10" style="font-size: 20px">
                    <strong>Question 10.</strong> <br/><br/>
                    <li>
                        Command to return just the different values of a query?
                    </li>
                </div>
                <div>
                    <input type="radio" name="10DB" ident="0"/> &nbsp;NOSAME<br/>
                    <input type="radio" name="10DB" ident="0"/> &nbsp;COUNT<br/>
                    <input type="radio" name="10DB" ident="1"/> &nbsp;DISTINCT<br/>
                </div> <br/><br/>
                <div>
                    <input type="button" value="Next" name="buttonQuestion" ident="11"/>
                </div>
            </div>
            <!--*****-->
            <!--Web-->
            <div id="question11" name="question">
                <div ident1="web" ident2="11" style="font-size: 20px">
                    <strong>Question 11.</strong> <br/><br/>
                    <li>
                        What does PHP stand for?
                    </li>
                </div>
                <div>
                    <input type="radio" name="11WEB" ident="0"/> &nbsp;Personal Hypertext Processor<br/>
                    <input type="radio" name="11WEB" ident="1"/> &nbsp;PHP: Hypertext Preprocessor<br/>
                    <input type="radio" name="11WEB" ident="0"/> &nbsp;Private Home Page<br/>
                </div> <br/><br/>
                <div>
                    <input type="button" value="Next" name="buttonQuestion" ident="12"/>
                </div>
            </div>
            <div id="question12" name="question">
                <div ident1="web" ident2="12" style="font-size: 20px">
                    <strong>Question 12.</strong> <br/><br/>
                    <li>
                        PHP server scripts are surrounded by delimiters, which?
                    </li>
                </div>
                <div>
                    <input type="radio" name="12WEB" ident="0"/> &nbsp;< script >...< /script ><br/>
                    <input type="radio" name="12WEB" ident="0"/> &nbsp;< ?php >...< /? ><br/>
                    <input type="radio" name="12WEB" ident="1"/> &nbsp;< ?php...? ><br/>
                </div> <br/><br/>
                <div>
                    <input type="button" value="Next" name="buttonQuestion" ident="13"/>
                </div>
            </div>
            <div id="question13" name="question">
                <div ident1="web" ident2="13" style="font-size: 20px">
                    <strong>Question 13.</strong> <br/><br/>
                    <li>
                        How do you write "Hello World" in PHP
                    </li>
                </div>
                <div>
                    <input type="radio" name="13WEB" ident="0"/> &nbsp;Document.Write("Hello World");<br/>
                    <input type="radio" name="13WEB" ident="1"/> &nbsp;echo "Hello World";<br/>
                    <input type="radio" name="13WEB" ident="0"/> &nbsp;"Hello World";<br/>
                </div> <br/><br/>
                <div>
                    <input type="button" value="Next" name="buttonQuestion" ident="14"/>
                </div>
            </div>
            <div id="question14" name="question">
                <div ident1="web" ident2="14" style="font-size: 20px">
                    <strong>Question 14.</strong> <br/><br/>
                    <li>
                        All variables in PHP start with which symbol?
                    </li>
                </div>
                <div>
                    <input type="radio" name="14WEB" ident="0"/> &nbsp;&<br/>
                    <input type="radio" name="14WEB" ident="1"/> &nbsp;$<br/>
                    <input type="radio" name="14WEB" ident="0"/> &nbsp;!<br/>
                </div> <br/><br/>
                <div>
                    <input type="button" value="Next" name="buttonQuestion" ident="15"/>
                </div>
            </div>
            <div id="question15" name="question">
                <div ident1="web" ident2="15" style="font-size: 20px">
                    <strong>Question 15.</strong> <br/><br/>
                    <li>
                        What is the correct way to end a PHP statement?
                    </li>
                </div>
                <div>
                    <input type="radio" name="15WEB" ident="1"/> &nbsp;;<br/>
                    <input type="radio" name="15WEB" ident="0"/> &nbsp;New line<br/>
                    <input type="radio" name="15WEB" ident="0"/> &nbsp;.<br/>
                </div> <br/><br/>
                <div>
                    <input type="button" value="Next" name="buttonQuestion" ident="16"/>
                </div>
            </div>
            <div id="question16" name="question">
                <div ident1="web" ident2="16" style="font-size: 20px">
                    <strong>Question 16.</strong> <br/><br/>
                    <li>
                        The PHP syntax is most similar to:
                    </li>
                </div>
                <div>
                    <input type="radio" name="16WEB" ident="1"/> &nbsp;Pearl and C<br/>
                    <input type="radio" name="16WEB" ident="0"/> &nbsp;Javascript<br/>
                    <input type="radio" name="16WEB" ident="0"/> &nbsp;VBScript<br/>
                </div> <br/><br/>
                <div>
                    <input type="button" value="Next" name="buttonQuestion" ident="17"/>
                </div>
            </div>
            <div id="question17" name="question">
                <div ident1="web" ident2="17" style="font-size: 20px">
                    <strong>Question 17.</strong> <br/><br/>
                    <li>
                        How do you get information from a form that is submitted using the "get" method?
                    </li>
                </div>
                <div>
                    <input type="radio" name="17WEB" ident="0"/> &nbsp;Request.Form;<br/>
                    <input type="radio" name="17WEB" ident="1"/> &nbsp;$_GET[];<br/>
                    <input type="radio" name="17WEB" ident="0"/> &nbsp;Request.QueryString<br/>
                </div> <br/><br/>
                <div>
                    <input type="button" value="Next" name="buttonQuestion" ident="18"/>
                </div>
            </div>
            <div id="question18" name="question">
                <div ident1="web" ident2="18" style="font-size: 20px">
                    <strong>Question 18.</strong> <br/><br/>
                    <li>
                        What is the correct way to include the file "time.inc"?
                    </li>
                </div>
                <div>
                    <input type="radio" name="18WEB" ident="0"/> &nbsp;< !-- include file="time.inc" -- ><br/>
                    <input type="radio" name="18WEB" ident="1"/> &nbsp;< ?php include "time.inc"; ? ><br/>
                    <input type="radio" name="18WEB" ident="0"/> &nbsp;< ?php include file="time.inc"; ? ><br/>
                </div> <br/><br/>
                <div>
                    <input type="button" value="Next" name="buttonQuestion" ident="19"/>
                </div>
            </div>
            <div id="question19" name="question">
                <div ident1="web" ident2="19" style="font-size: 20px">
                    <strong>Question 19.</strong> <br/><br/>
                    <li>
                        What is the correct way to create a function in PHP?
                    </li>
                </div>
                <div>
                    <input type="radio" name="19WEB" ident="1"/> &nbsp;function myFunction()<br/>
                    <input type="radio" name="19WEB" ident="0"/> &nbsp;create myFunction()<br/>
                    <input type="radio" name="19WEB" ident="0"/> &nbsp;new_function myFunction()<br/>
                </div> <br/><br/>
                <div>
                    <input type="button" value="Next" name="buttonQuestion" ident="20"/>
                </div>
            </div>
            <div id="question20" name="question">
                <div ident1="web" ident2="20" style="font-size: 20px">
                    <strong>Question 20.</strong> <br/><br/>
                    <li>
                        What is the correct way to open the file "time.txt" as readable?
                    </li>
                </div>
                <div>
                    <input type="radio" name="20WEB" ident="0"/> &nbsp;open("time.txt","read");<br/>
                    <input type="radio" name="20WEB" ident="0"/> &nbsp;open("time.txt");<br/>
                    <input type="radio" name="20WEB" ident="1"/> &nbsp;fopen("time.txt","r");<br/>
                </div> <br/><br/>
                <div>
                    <input type="button" value="Next" name="buttonQuestion" ident="21"/>
                </div>
            </div>
            <!--*****-->
            <!--Security-->
            <div id="question21" name="question">
                <div ident1="security" ident2="21" style="font-size: 20px">
                    <strong>Question 21.</strong> <br/><br/>
                    <li>
                        What is phishing?
                    </li>
                </div>
                <div>
                    <input type="radio" name="21SECURITY" ident="0"/> &nbsp;A new kind of software.<br/>
                    <input type="radio" name="21SECURITY" ident="1"/> &nbsp;An e-mail scam.<br/>
                    <input type="radio" name="21SECURITY" ident="0"/> &nbsp;A data transfer protocol.<br/>
                </div> <br/><br/>
                <div>
                    <input type="button" value="Next" name="buttonQuestion" ident="22"/>
                </div>
            </div>
            <div id="question22" name="question">
                <div ident1="security" ident2="22" style="font-size: 20px">
                    <strong>Question 22.</strong> <br/><br/>
                    <li>
                        A firewall is security software. True or false?
                    </li>
                </div>
                <div>
                    <input type="radio" name="22SECURITY" ident="1"/> &nbsp;True<br/>
                    <input type="radio" name="22SECURITY" ident="0"/> &nbsp;False<br/>
                </div> <br/><br/>
                <div>
                    <input type="button" value="Next" name="buttonQuestion" ident="23"/>
                </div>
            </div>
            <div id="question23" name="question">
                <div ident1="security" ident2="23" style="font-size: 20px">
                    <strong>Question 23.</strong> <br/><br/>
                    <li>
                        How often should you update your antivirus software?
                    </li>
                </div>
                <div>
                    <input type="radio" name="23SECURITY" ident="0"/> &nbsp;Every day.<br/>
                    <input type="radio" name="23SECURITY" ident="0"/> &nbsp;Every month.<br/>
                    <input type="radio" name="23SECURITY" ident="1"/> &nbsp;Your program should update automatically when you connect to the Internet.<br/>
                </div> <br/><br/>
                <div>
                    <input type="button" value="Next" name="buttonQuestion" ident="24"/>
                </div>
            </div>
            <div id="question24" name="question">
                <div ident1="security" ident2="24" style="font-size: 20px">
                    <strong>Question 24.</strong> <br/><br/>
                    <li>
                        What is a cookie?
                    </li>
                </div>
                <div>
                    <input type="radio" name="24SECURITY" ident="1"/> &nbsp;A file that makes it easier to access a Web site and browse.<br/>
                    <input type="radio" name="24SECURITY" ident="0"/> &nbsp;A file that hackers use to steal your identity.<br/>
                    <input type="radio" name="24SECURITY" ident="0"/> &nbsp;A computer virus.<br/>
                </div> <br/><br/>
                <div>
                    <input type="button" value="Next" name="buttonQuestion" ident="25"/>
                </div>
            </div>
            <div id="question25" name="question">
                <div ident1="security" ident2="25" style="font-size: 20px">
                    <strong>Question 25.</strong> <br/><br/>
                    <li>
                        Why am I asked to confirm my identification at Desjardins ATMs?
                    </li>
                </div>
                <div>
                    <input type="radio" name="25SECURITY" ident="0"/> &nbsp;To find out if you are old enough to use the ATM.<br/>
                    <input type="radio" name="25SECURITY" ident="0"/> &nbsp;To check if your debit card is valid.<br/>
                    <input type="radio" name="25SECURITY" ident="1"/> &nbsp;To validate your identity.<br/>
                </div> <br/><br/>
                <div>
                    <input type="button" value="Next" name="buttonQuestion" ident="26"/>
                </div>
            </div>
            <div id="question26" name="question">
                <div ident1="security" ident2="26" style="font-size: 20px">
                    <strong>Question 26.</strong> <br/><br/>
                    <li>
                        What is the digital certificate of a secured Web site used for?
                    </li>
                </div>
                <div>
                    <input type="radio" name="26SECURITY" ident="0"/> &nbsp;It calculates the number of visitors a day.<br/>
                    <input type="radio" name="26SECURITY" ident="0"/> &nbsp;It saves the identities of site visitors.<br/>
                    <input type="radio" name="26SECURITY" ident="1"/> &nbsp;It enables visitors to confirm the authenticity of the site they are on.<br/>
                </div> <br/><br/>
                <div>
                    <input type="button" value="Next" name="buttonQuestion" ident="27"/>
                </div>
            </div>
            <div id="question27" name="question">
                <div ident1="security" ident2="27" style="font-size: 20px">
                    <strong>Question 27.</strong> <br/><br/>
                    <li>
                        What is encryption used for?
                    </li>
                </div>
                <div>
                    <input type="radio" name="27SECURITY" ident="0"/> &nbsp;Compiling statistics on a Web site.<br/>
                    <input type="radio" name="27SECURITY" ident="0"/> &nbsp;Calculating how often you visit a site compared to others.<br/>
                    <input type="radio" name="27SECURITY" ident="1"/> &nbsp;Encrypting your personal information when sending data on the Internet.<br/>
                </div> <br/><br/>
                <div>
                    <input type="button" value="Next" name="buttonQuestion" ident="28"/>
                </div>
            </div>
            <div id="question28" name="question">
                <div ident1="security" ident2="28" style="font-size: 20px">
                    <strong>Question 28.</strong> <br/><br/>
                    <li>
                        A Desjardins employee calls you to ask for confidential information about some of your accounts. What do you do?
                    </li>
                </div>
                <div>
                    <input type="radio" name="28SECURITY" ident="0"/> &nbsp;Answer his questions.<br/>
                    <input type="radio" name="28SECURITY" ident="0"/> &nbsp;Ask to speak to his supervisor.<br/>
                    <input type="radio" name="28SECURITY" ident="1"/> &nbsp;Tell him that you will contact your caisse yourself to give them the information.<br/>
                </div> <br/><br/>
                <div>
                    <input type="button" value="Next" name="buttonQuestion" ident="29"/>
                </div>
            </div>
            <div id="question29" name="question">
                <div ident1="security" ident2="29" style="font-size: 20px">
                    <strong>Question 29.</strong> <br/><br/>
                    <li>
                        You are logged on to AccèsD in an Internet café. What should you do to make sure your transactions remain safe?
                    </li>
                </div>
                <div>
                    <input type="radio" name="29SECURITY" ident="1"/> &nbsp;Check the I am using a public or shared computerbox on the AccèsD home page when you log on and click onLog off at the top of the screen, clear the cache memory and close the browser when you're done.<br/>
                    <input type="radio" name="29SECURITY" ident="0"/> &nbsp;Turn off the computer.<br/>
                    <input type="radio" name="29SECURITY" ident="0"/> &nbsp;I don't know.<br/>
                </div> <br/><br/>
                <div>
                    <input type="button" value="Next" name="buttonQuestion" ident="30"/>
                </div>
            </div>
            <div id="question30" name="question">
                <div ident1="security" ident2="30" style="font-size: 20px">
                    <strong>Question 30.</strong> <br/><br/>
                    <li>
                        You receive an e-mail from Desjardins saying that you have won a contest. What should you do?
                    </li>
                </div>
                <div>
                    <input type="radio" name="30SECURITY" ident="0"/> &nbsp;Hurry to provide all the information so you can claim your prize as quickly as possible.<br/>
                    <input type="radio" name="30SECURITY" ident="1"/> &nbsp;Contact your caisse to confirm the information.<br/>
                    <input type="radio" name="30SECURITY" ident="0"/> &nbsp;Answer the e-mail and ask them to call you with more information.<br/>
                </div> <br/><br/>
                <div>
                    <input type="button" value="Next" name="buttonQuestion" ident="31"/>
                </div>
            </div>
            <!--*****-->
            <!--Networking-->
            <div id="question31" name="question">
                <div ident1="networking" ident2="31" style="font-size: 20px">
                    <strong>Question 31.</strong> <br/><br/>
                    <li>
                        The maximum number of nodes per segment depends on the_______.?
                    </li>
                </div>
                <div>
                    <input type="radio" name="31NETWORKING" ident="0"/> &nbsp;Bandwidth<br/>
                    <input type="radio" name="31NETWORKING" ident="0"/> &nbsp;Regeneration ability<br/>
                    <input type="radio" name="31NETWORKING" ident="1"/> &nbsp;Attenuation<br/>
                </div> <br/><br/>
                <div>
                    <input type="button" value="Next" name="buttonQuestion" ident="32"/>
                </div>
            </div>
            <div id="question32" name="question">
                <div ident1="networking" ident2="32" style="font-size: 20px">
                    <strong>Question 32.</strong> <br/><br/>
                    <li>
                        Information can be transmitted via one of_______siganlling method(s).
                    </li>
                </div>
                <div>
                    <input type="radio" name="32NETWORKING" ident="0"/> &nbsp;One<br/>
                    <input type="radio" name="32NETWORKING" ident="1"/> &nbsp;Two<br/>
                    <input type="radio" name="32NETWORKING" ident="0"/> &nbsp;Four<br/>
                </div> <br/><br/>
                <div>
                    <input type="button" value="Next" name="buttonQuestion" ident="33"/>
                </div>
            </div>
            <div id="question33" name="question">
                <div ident1="networking" ident2="33" style="font-size: 20px">
                    <strong>Question 33.</strong> <br/><br/>
                    <li>
                        IEEE designates Thicknet as_______Ethernet.
                    </li>
                </div>
                <div>
                    <input type="radio" name="33NETWORKING" ident="1"/> &nbsp;10Base5<br/>
                    <input type="radio" name="33NETWORKING" ident="0"/> &nbsp;10BaseT<br/>
                    <input type="radio" name="33NETWORKING" ident="0"/> &nbsp;10Base2<br/>
                </div> <br/><br/>
                <div>
                    <input type="button" value="Next" name="buttonQuestion" ident="34"/>
                </div>
            </div>
            <div id="question34" name="question">
                <div ident1="networking" ident2="34" style="font-size: 20px">
                    <strong>Question 34.</strong> <br/><br/>
                    <li>
                        Vertical connectors between floors are known as_______.
                    </li>
                </div>
                <div>
                    <input type="radio" name="34NETWORKING" ident="0"/> &nbsp;Spans<br/>
                    <input type="radio" name="34NETWORKING" ident="1"/> &nbsp;Riser<br/>
                    <input type="radio" name="34NETWORKING" ident="0"/> &nbsp;Lift<br/>
                </div> <br/><br/>
                <div>
                    <input type="button" value="Next" name="buttonQuestion" ident="35"/>
                </div>
            </div>
            <div id="question35" name="question">
                <div ident1="networking" ident2="35" style="font-size: 20px">
                    <strong>Question 35.</strong> <br/><br/>
                    <li>
                        ________ensure(s) that data are transferred whole, in sequence, and without error from one node on the network to another.
                    </li>
                </div>
                <div>
                    <input type="radio" name="35NETWORKING" ident="0"/> &nbsp;Data Packets<br/>
                    <input type="radio" name="35NETWORKING" ident="1"/> &nbsp;Protocol<br/>
                    <input type="radio" name="35NETWORKING" ident="0"/> &nbsp;File services<br/>
                </div> <br/><br/>
                <div>
                    <input type="button" value="Next" name="buttonQuestion" ident="36"/>
                </div>
            </div>
            <div id="question36" name="question">
                <div ident1="networking" ident2="36" style="font-size: 20px">
                    <strong>Question 36.</strong> <br/><br/>
                    <li>
                        The maximum segment lenght on a 10BaseT network is_______meters.
                    </li>
                </div>
                <div>
                    <input type="radio" name="36NETWORKING" ident="0"/> &nbsp;10<br/>
                    <input type="radio" name="36NETWORKING" ident="0"/> &nbsp;50<br/>
                    <input type="radio" name="36NETWORKING" ident="1"/> &nbsp;100<br/>
                </div> <br/><br/>
                <div>
                    <input type="button" value="Next" name="buttonQuestion" ident="37"/>
                </div>
            </div>
            <div id="question37" name="question">
                <div ident1="networking" ident2="37" style="font-size: 20px">
                    <strong>Question 37.</strong> <br/><br/>
                    <li>
                        The first networks transmitted data over thick, heavy coaxial cables.
                    </li>
                </div>
                <div>
                    <input type="radio" name="37NETWORKING" ident="1"/> &nbsp;True<br/>
                    <input type="radio" name="37NETWORKING" ident="0"/> &nbsp;False<br/>
                </div> <br/><br/>
                <div>
                    <input type="button" value="Next" name="buttonQuestion" ident="38"/>
                </div>
            </div>
            <div id="question38" name="question">
                <div ident1="networking" ident2="38" style="font-size: 20px">
                    <strong>Question 38.</strong> <br/><br/>
                    <li>
                        Which cannot support full-duplexing?
                    </li>
                </div>
                <div>
                    <input type="radio" name="38NETWORKING" ident="1"/> &nbsp;10BaseT4<br/>
                    <input type="radio" name="38NETWORKING" ident="0"/> &nbsp;10BaseT<br/>
                    <input type="radio" name="38NETWORKING" ident="0"/> &nbsp;100BaseTX<br/>
                </div> <br/><br/>
                <div>
                    <input type="button" value="Next" name="buttonQuestion" ident="39"/>
                </div>
            </div>
            <div id="question39" name="question">
                <div ident1="networking" ident2="39" style="font-size: 20px">
                    <strong>Question 39.</strong> <br/><br/>
                    <li>
                        Which is not an example of transmission media?
                    </li>
                </div>
                <div>
                    <input type="radio" name="39NETWORKING" ident="0"/> &nbsp;Wire<br/>
                    <input type="radio" name="39NETWORKING" ident="0"/> &nbsp;Coaxial cable<br/>
                    <input type="radio" name="39NETWORKING" ident="1"/> &nbsp;None of the above<br/>
                </div> <br/><br/>
                <div>
                    <input type="button" value="Next" name="buttonQuestion" ident="40"/>
                </div>
            </div>
            <div id="question40" name="question">
                <div ident1="networking" ident2="40" style="font-size: 20px">
                    <strong>Question 40.</strong> <br/><br/>
                    <li>
                        Mail services requires a significant commitment of technical support and administration and resources due to their_______.
                    </li>
                </div>
                <div>
                    <input type="radio" name="40NETWORKING" ident="0"/> &nbsp;Instability<br/>
                    <input type="radio" name="40NETWORKING" ident="0"/> &nbsp;Routing capacility<br/>
                    <input type="radio" name="40NETWORKING" ident="1"/> &nbsp;Heavy use<br/>
                </div> <br/><br/>
                <div>
                    <input type="button" value="Next" name="buttonQuestion" ident="41"/>
                </div>
            </div>
            <!--*****-->
            <!--Desktop apps-->
            <div id="question41" name="question">
                <div ident1="networking" ident2="41" style="font-size: 20px">
                    <strong>Question 41.</strong> <br/><br/>
                    <li>
                        int []a = {1,2,3,4,5,6}; <br/>
                            inti = a.length - 1; <br/>
                                while(i>=0){  <br/>
                                  System.out.print(a[i]); <br/>
                                  i--; <br/>
                                } <br/>
                                <strong>What's the result?</strong>
                    </li>
                </div>
                <div>
                    <input type="radio" name="41DESKTOP" ident="0"/> &nbsp;123456<br/>
                    <input type="radio" name="41DESKTOP" ident="0"/> &nbsp;654321<br/>
                    <input type="radio" name="41DESKTOP" ident="1"/> &nbsp;65432<br/>
                </div> <br/><br/>
                <div>
                    <input type="button" value="Next" name="buttonQuestion" ident="42"/>
                </div>
            </div>
            <div id="question42" name="question">
                <div ident1="networking" ident2="42" style="font-size: 20px">
                    <strong>Question 42.</strong> <br/><br/>
                    <li>
                        <strong>Given</strong> <br/>
                        class Ex6{<br/>
                          public static void main(String args[]){<br/>
                            int x = 0, y=10;          <br/>
                              try{<br/>
                                y /=x;<br/> 
                                }<br/>
                            System.out.print("/ by 0");<br/>
                              catch(Exception e){<br/>
                                System.out.print("error");<br/>
                              }<br/>
                          }  } <br/>
                          <strong>What's the result?</strong>
                    </li>
                </div>
                <div>
                    <input type="radio" name="42DESKTOP" ident="0"/> &nbsp;0<br/>
                    <input type="radio" name="42DESKTOP" ident="0"/> &nbsp;Error<br/>
                    <input type="radio" name="42DESKTOP" ident="1"/> &nbsp;Compilation fails<br/>
                </div> <br/><br/>
                <div>
                    <input type="button" value="Next" name="buttonQuestion" ident="43"/>
                </div>
            </div>
            <div id="question43" name="question">
                <div ident1="networking" ident2="43" style="font-size: 20px">
                    <strong>Question 43.</strong> <br/><br/>
                    <li>
                        <strong>Given</strong> <br/>
                        class Ex1{<br/>
                          public static void main(String[] args) {<br/>
                        int a[] = { 1,2,3,4};<br/>
                      System.out.print(a instanceof Object);<br/>
                         }<br/>
                        }<br/>

                          <strong>What's the result?</strong>
                    </li>
                </div>
                <div>
                    <input type="radio" name="43DESKTOP" ident="1"/> &nbsp;Will produce output as true<br/>
                    <input type="radio" name="43DESKTOP" ident="0"/> &nbsp;Compilation fails due to error at line 3<br/>
                    <input type="radio" name="43DESKTOP" ident="0"/> &nbsp;Will produce output as false<br/>
                </div> <br/><br/>
                <div>
                    <input type="button" value="Next" name="buttonQuestion" ident="44"/>
                </div>
            </div>
            <div id="question44" name="question">
                <div ident1="networking" ident2="44" style="font-size: 20px">
                    <strong>Question 44.</strong> <br/><br/>
                    <li>
                        <strong>Given</strong> <br/>
                        class Student s1, s2; // Here 'Student' is a user-defined class.<br/>
                        s1 = new Student(); <br/>
                        s2 = new Student();<br/>


                        <strong>Answer: </strong>
                    </li>
                </div>
                <div>
                    <input type="radio" name="44DESKTOP" ident="0"/> &nbsp;Contents of s1 and s2 will be exactly same<br/>
                    <input type="radio" name="44DESKTOP" ident="1"/> &nbsp;Contents of the two objects created will be exactly same<br/>
                    <input type="radio" name="44DESKTOP" ident="0"/> &nbsp;The two objects will get created on the stack<br/>
                </div> <br/><br/>
                <div>
                    <input type="button" value="Next" name="buttonQuestion" ident="45"/>
                </div>
            </div>
            <div id="question45" name="question">
                <div ident1="networking" ident2="45" style="font-size: 20px">
                    <strong>Question 45.</strong> <br/><br/>
                    <li>
                        <strong>Given</strong> <br/>
                        class Sample<br/>
                        {<br/>
                            private int i;<br/>
                            public Single j;<br/>
                            private void DisplayData()<br/>
                            {<br/>
                                Console.WriteLine(i + " " + j);<br/>
                            }<br/>
                            public void ShowData()<br/>
                            {<br/>
                                Console.WriteLine(i + " " + j);<br/>
                            }<br/>
                        }<br/>

                        <strong>Answer: </strong>
                    </li>
                </div>
                <div>
                    <input type="radio" name="45DESKTOP" ident="1"/> &nbsp;There is no error in this class<br/>
                    <input type="radio" name="45DESKTOP" ident="0"/> &nbsp;DisplayData() cannot access j<br/>
                    <input type="radio" name="45DESKTOP" ident="0"/> &nbsp;j cannot be declared as public<br/>
                </div> <br/><br/>
                <div>
                    <input type="button" value="Next" name="buttonQuestion" ident="46"/>
                </div>
            </div>
            <div id="question46" name="question">
                <div ident1="networking" ident2="46" style="font-size: 20px">
                    <strong>Question 46.</strong> <br/><br/>
                    <li>
                        <strong>Which of the following can be facilitated by the Inheritance mechanism?</strong><br/>
                    	1. Use the existing functionality of base class.<br/>
                    	2. Overrride the existing functionality of base class.<br/>
                    	3. Implement new functionality in the derived class.<br/>
                    	4. Implement polymorphic behaviour.<br/>
                    	5. Implement containership.<br/>
                    </li>
                </div>
                <div>
                    <input type="radio" name="46DESKTOP" ident="1"/> &nbsp;1, 2, 3<br/>
                    <input type="radio" name="46DESKTOP" ident="0"/> &nbsp;3, 4<br/>
                    <input type="radio" name="46DESKTOP" ident="0"/> &nbsp;2, 4, 5<br/>
                </div> <br/><br/>
                <div>
                    <input type="button" value="Next" name="buttonQuestion" ident="47"/>
                </div>
            </div>
            <div id="question47" name="question">
                <div ident1="networking" ident2="47" style="font-size: 20px">
                    <strong>Question 47.</strong> <br/><br/>
                    <li>
                        Microsoft Windows uses a GUI environment. GUI (pronounced "gooey") stands for: 
                    </li>
                </div>
                <div>
                    <input type="radio" name="47DESKTOP" ident="0"/> &nbsp;Geographical User Interchange<br/>
                    <input type="radio" name="47DESKTOP" ident="1"/> &nbsp;Graphical User Interface<br/>
                    <input type="radio" name="47DESKTOP" ident="0"/> &nbsp;Grammatical User Incorporation<br/>
                </div> <br/><br/>
                <div>
                    <input type="button" value="Next" name="buttonQuestion" ident="48"/>
                </div>
            </div>
            <div id="question48" name="question">
                <div ident1="networking" ident2="48" style="font-size: 20px">
                    <strong>Question 48.</strong> <br/><br/>
                    <li>
                        Visual Basic is a(n)
                    </li>
                </div>
                <div>
                    <input type="radio" name="48DESKTOP" ident="0"/> &nbsp;Procedural programming language<br/>
                    <input type="radio" name="48DESKTOP" ident="0"/> &nbsp;Hyperlink programming language<br/>
                    <input type="radio" name="48DESKTOP" ident="1"/> &nbsp;Object-oriented programming language<br/>
                </div> <br/><br/>
                <div>
                    <input type="button" value="Next" name="buttonQuestion" ident="49"/>
                </div>
            </div>
            <div id="question49" name="question">
                <div ident1="networking" ident2="49" style="font-size: 20px">
                    <strong>Question 49.</strong> <br/><br/>
                    <li>
                        When you plan a Visual Basic program, you follow a three-step process that should end with _______.
                    </li>
                </div>
                <div>
                    <input type="radio" name="49DESKTOP" ident="0"/> &nbsp;Setting the properties<br/>
                    <input type="radio" name="49DESKTOP" ident="1"/> &nbsp;Writing the Basic code<br/>
                    <input type="radio" name="49DESKTOP" ident="0"/> &nbsp;Coding all of the remark statements<br/>
                </div> <br/><br/>
                <div>
                    <input type="button" value="Next" name="buttonQuestion" ident="50"/>
                </div>
            </div>
            <div id="question50" name="question">
                <div ident1="networking" ident2="50" style="font-size: 20px">
                    <strong>Question 50.</strong> <br/><br/>
                    <li>
                        Which window do you open if you want to see all of the objects that you can add to a form?
                    </li>
                </div>
                <div>
                    <input type="radio" name="50DESKTOP" ident="1"/> &nbsp;The Toolbox<br/>
                    <input type="radio" name="50DESKTOP" ident="0"/> &nbsp;The Solution window<br/>
                    <input type="radio" name="50DESKTOP" ident="0"/> &nbsp;The Properties window<br/>
                </div> <br/><br/>
                <div>
                    <input type="button" value="Save Questions" name="Save" ident="50"/>
                </div>
            </div>
            <!--*****-->
        </div>
        <br/><br/><br/>
    </div>
    <input type="hidden" id="url" value="<?php echo base_url(); ?>"/>
</body>

<?php
    } else {
        include 'error.php';
    }
?>