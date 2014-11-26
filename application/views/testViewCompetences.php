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
            question1 = $('[name="1team"]:checked').attr('ident');
            question2 = $('[name="2team"]:checked').attr('ident');            
            question3 = $('[name="3team"]:checked').attr('ident');
            question4 = $('[name="4team"]:checked').attr('ident');
            question5 = $('[name="5team"]:checked').attr('ident');
            question6 = $('[name="6comunication"]:checked').attr('ident');
            question7 = $('[name="7comunication"]:checked').attr('ident');
            question8 = $('[name="8comunication"]:checked').attr('ident');
            question9 = $('[name="9comunication"]:checked').attr('ident');
            question10 = $('[name="10comunication"]:checked').attr('ident');
            question11 = $('[name="11work"]:checked').attr('ident');
            question12 = $('[name="12work"]:checked').attr('ident');
            question13 = $('[name="13work"]:checked').attr('ident');
            question14 = $('[name="14work"]:checked').attr('ident');
            question15 = $('[name="15work"]:checked').attr('ident');
            question16 = $('[name="16leader"]:checked').attr('ident');
            question17 = $('[name="17leader"]:checked').attr('ident');
            question18 = $('[name="18leader"]:checked').attr('ident');
            question19 = $('[name="19leader"]:checked').attr('ident');
            question20 = $('[name="20leader"]:checked').attr('ident');
            question21 = $('[name="21initiative"]:checked').attr('ident');
            question22 = $('[name="22initiative"]:checked').attr('ident');
            question23 = $('[name="23initiative"]:checked').attr('ident');
            question24 = $('[name="24initiative"]:checked').attr('ident');
            question25 = $('[name="25initiative"]:checked').attr('ident');
            
            url = $("#url").val();
            user = $("#idUsuario").val();            
            $.post(url+"index.php/usuarioscontroller/gradeCompetences", {
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
        <div class="principalArea" style="margin-left:13%; margin-right:13%">
            <div id="instructions" style="text-align: center; width: 70%; margin-left: 16%; font-size: medium;">
                <p>
                    The following test was implemented to evaluate your capabilities into different competencies. 
                    Please answer honestly and be sure to save all your responses at the 
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
            <!--Team Work-->
            <div id="question1" name="question">
                <div ident1="db" ident2="1" style="font-size: 20px">
                    <strong>Question 1.</strong> <br/><br/>
                    <li>
                        For most projects, I prefer to rely on my own skills and abilities rather than work with others
                    </li>
                </div>
                <div>
                    <input type="radio" name="1team" ident="5"/> &nbsp;Strongly Agree <br/>
                    <input type="radio" name="1team" ident="4"/> &nbsp;Agree<br/>
                    <input type="radio" name="1team" ident="3"/> &nbsp;Neither Agree nor Disagree<br/>
                    <input type="radio" name="1team" ident="2"/> &nbsp;Disagree<br/>
                    <input type="radio" name="1team" ident="1"/> &nbsp;Strongly Disagree<br/>
                </div> <br/><br/>
                <div>
                    <input type="button" value="Next" name="buttonQuestion" class="btn btn-default" ident="2"/>
                </div>
            </div>
            <div id="question2" name="question">
                <div ident1="db" ident2="2" style="font-size: 20px">
                    <strong>Question 2.</strong> <br/><br/>
                    <li>
                        While I am focused on my personal career success, I do truly support my team members and want the team to succeed
                    </li>
                </div>
                <div>
                    <input type="radio" name="2team" ident="5"/> &nbsp;Strongly Agree <br/>
                    <input type="radio" name="2team" ident="4"/> &nbsp;Agree<br/>
                    <input type="radio" name="2team" ident="3"/> &nbsp;Neither Agree nor Disagree<br/>
                    <input type="radio" name="2team" ident="2"/> &nbsp;Disagree<br/>
                    <input type="radio" name="2team" ident="1"/> &nbsp;Strongly Disagree<br/>
                </div> <br/><br/>
                <div>
                    <input type="button" value="Next" name="buttonQuestion" class="btn btn-default" ident="3"/>
                </div>
            </div>
            <div id="question3" name="question">
                <div ident1="db" ident2="3" style="font-size: 20px">
                    <strong>Question 3.</strong> <br/><br/>
                    <li>
                        For the most part, I believe that my team members do not work as hard as I do
                    </li>
                </div>
                <div>
                    <input type="radio" name="3team" ident="5"/> &nbsp;Strongly Agree <br/>
                    <input type="radio" name="3team" ident="4"/> &nbsp;Agree<br/>
                    <input type="radio" name="3team" ident="3"/> &nbsp;Neither Agree nor Disagree<br/>
                    <input type="radio" name="3team" ident="2"/> &nbsp;Disagree<br/>
                    <input type="radio" name="3team" ident="1"/> &nbsp;Strongly Disagree<br/>
                </div> <br/><br/>
                <div>
                    <input type="button" value="Next" name="buttonQuestion" class="btn btn-default" ident="4"/>
                </div>
            </div>
            <div id="question4" name="question">
                <div ident1="db" ident2="4" style="font-size: 20px">
                    <strong>Question 4.</strong> <br/><br/>
                    <li>
                        I seek out ways to learn to get along better with people and to do a better job of collaborating, to be a better team member
                    </li>
                </div>
                <div>
                    <input type="radio" name="4team" ident="5"/> &nbsp;Strongly Agree <br/>
                    <input type="radio" name="4team" ident="4"/> &nbsp;Agree<br/>
                    <input type="radio" name="4team" ident="3"/> &nbsp;Neither Agree nor Disagree<br/>
                    <input type="radio" name="4team" ident="2"/> &nbsp;Disagree<br/>
                    <input type="radio" name="4team" ident="1"/> &nbsp;Strongly Disagree<br/>
                </div> <br/><br/>
                <div>
                    <input type="button" value="Next" name="buttonQuestion" class="btn btn-default" ident="5"/>
                </div>
            </div>
            <div id="question5" name="question">
                <div ident1="db" ident2="5" style="font-size: 20px">
                    <strong>Question 5.</strong> <br/><br/>
                    <li>
                         I tend to come up with the best solutions to the problems my team faces, yet I usually receive very little of the credit
                    </li>
                </div>
                <div>
                    <input type="radio" name="5team" ident="5"/> &nbsp;Strongly Agree <br/>
                    <input type="radio" name="5team" ident="4"/> &nbsp;Agree<br/>
                    <input type="radio" name="5team" ident="3"/> &nbsp;Neither Agree nor Disagree<br/>
                    <input type="radio" name="5team" ident="2"/> &nbsp;Disagree<br/>
                    <input type="radio" name="5team" ident="1"/> &nbsp;Strongly Disagree<br/>
                </div> <br/><br/>
                <div>
                    <input type="button" value="Next" name="buttonQuestion" class="btn btn-default" ident="6"/>
                </div>
            </div>
            <!--*****-->
            <!--Comunication-->
            <div id="question6" name="question">
                <div ident1="comunication" ident2="6" style="font-size: 20px">
                    <strong>Question 6.</strong> <br/><br/>
                    <li>
                         In some 19th century novels you see the very poor conditions people lived in that can only be described as ......... misery
                    </li>
                </div>
                <div>
                    <input type="radio" name="1comunication" ident="5"/> &nbsp;Dejected <br/>
                    <input type="radio" name="1comunication" ident="4"/> &nbsp;Object<br/>
                    <input type="radio" name="1comunication" ident="3"/> &nbsp;Reject<br/>
                    <input type="radio" name="1comunication" ident="2"/> &nbsp;Abject<br/>
                </div> <br/><br/>
                <div>
                    <input type="button" value="Next" name="buttonQuestion" class="btn btn-default" ident="7"/>
                </div>
            </div>
            <div id="question7" name="question">
                <div ident1="comunication" ident2="7" style="font-size: 20px">
                    <strong>Question 7.</strong> <br/><br/>
                    <li>
                         Television can give you a very good idea of how people live in different countries as it can ......... scenes from every day life
                    </li>
                </div>
                <div>
                    <input type="radio" name="2comunication" ident="5"/> &nbsp;Deter <br/>
                    <input type="radio" name="2comunication" ident="4"/> &nbsp;Depict<br/>
                    <input type="radio" name="2comunication" ident="3"/> &nbsp;Delineate<br/>
                    <input type="radio" name="2comunication" ident="2"/> &nbsp;Defer<br/>
                </div> <br/><br/>
                <div>
                    <input type="button" value="Next" name="buttonQuestion" class="btn btn-default" ident="8"/>
                </div>
            </div>
            <div id="question8" name="question">
                <div ident1="comunication" ident2="8" style="font-size: 20px">
                    <strong>Question 8.</strong> <br/><br/>
                    <li>
                         This is a sort of shortened version of what happened and has been ......... to fit into the newspaper
                    </li>
                </div>
                <div>
                    <input type="radio" name="3comunication" ident="5"/> &nbsp;Adopted <br/>
                    <input type="radio" name="3comunication" ident="4"/> &nbsp;Attuned<br/>
                    <input type="radio" name="3comunication" ident="3"/> &nbsp;Abbreviated<br/>
                    <input type="radio" name="3comunication" ident="2"/> &nbsp;Added<br/>
                </div> <br/><br/>
                <div>
                    <input type="button" value="Next" name="buttonQuestion" class="btn btn-default" ident="9"/>
                </div>
            </div>
            <div id="question9" name="question">
                <div ident1="comunication" ident2="9" style="font-size: 20px">
                    <strong>Question 9.</strong> <br/><br/>
                    <li>
                         It was quite obvious from the secretive manner in which he left the shop and the .........looks he kept giving that he hadn't paid for the items of clothing
                    </li>
                </div>
                <div>
                    <input type="radio" name="4comunication" ident="5"/> &nbsp;Furtive <br/>
                    <input type="radio" name="4comunication" ident="4"/> &nbsp;Fugitive<br/>
                    <input type="radio" name="4comunication" ident="3"/> &nbsp;Furious<br/>
                    <input type="radio" name="4comunication" ident="2"/> &nbsp;Famous<br/>
                </div> <br/><br/>
                <div>
                    <input type="button" value="Next" name="buttonQuestion" class="btn btn-default" ident="10"/>
                </div>
            </div>
            <div id="question10" name="question">
                <div ident1="comunication" ident2="10" style="font-size: 20px">
                    <strong>Question 10.</strong> <br/><br/>
                    <li>
                         It was a remarkable performance because the actor seemed to convey the whole range of human emotions , what you might call the complete ......... from beginning to end
                    </li>
                </div>
                <div>
                    <input type="radio" name="5comunication" ident="5"/> &nbsp;Gamble <br/>
                    <input type="radio" name="5comunication" ident="4"/> &nbsp;Grasp<br/>
                    <input type="radio" name="5comunication" ident="3"/> &nbsp;Granting<br/>
                    <input type="radio" name="5comunication" ident="2"/> &nbsp;Gamut<br/>
                </div> <br/><br/>
                <div>
                    <input type="button" value="Next" name="buttonQuestion" class="btn btn-default" ident="11"/>
                </div>
            </div>
            <!--*****-->
            <!--Work under pressure-->
            <div id="question11" name="question">
                <div ident1="comunication" ident2="11" style="font-size: 20px">
                    <strong>Question 11.</strong> <br/><br/>
                    <li>
                         Do you find muscle tension, especially in your neck, back and jaw?
                    </li>
                </div>
                <div>
                    <input type="radio" name="1work" ident="0"/> &nbsp;Yes, I'm pretty tense, and often sore. In fact, I could use a massage right now <br/>
                    <input type="radio" name="1work" ident="5"/> &nbsp;No, I'm pretty loose<br/>
                </div> <br/><br/>
                <div>
                    <input type="button" value="Next" name="buttonQuestion" class="btn btn-default" ident="12"/>
                </div>
            </div>
            <div id="question12" name="question">
                <div ident1="comunication" ident2="12" style="font-size: 20px">
                    <strong>Question 12.</strong> <br/><br/>
                    <li>
                         Do you have more difficulty with decision-making and concentration these days, or find that you're forgetting things more often?
                    </li>
                </div>
                <div>
                    <input type="radio" name="2work" ident="0"/> &nbsp;Yes, my mind is a bit foggy these days.<br/>
                    <input type="radio" name="2work" ident="5"/> &nbsp;No, I'm still pretty sharp<br/>
                </div> <br/><br/>
                <div>
                    <input type="button" value="Next" name="buttonQuestion" class="btn btn-default" ident="13"/>
                </div>
            </div>
            <div id="question13" name="question">
                <div ident1="comunication" ident2="13" style="font-size: 20px">
                    <strong>Question 13.</strong> <br/><br/>
                    <li>
                         Do you find yourself getting less joy from your work and feeling a sense of burnout?
                    </li>
                </div>
                <div>
                    <input type="radio" name="3work" ident="0"/> &nbsp;Yes, I'm wondering if I'm approaching burnout, or if I'm already there!<br/>
                    <input type="radio" name="3work" ident="5"/> &nbsp;No, I still enjoy my work as much as I ever did.<br/>
                </div> <br/><br/>
                <div>
                    <input type="button" value="Next" name="buttonQuestion" class="btn btn-default" ident="14"/>
                </div>
            </div>
            <div id="question14" name="question">
                <div ident1="comunication" ident2="14" style="font-size: 20px">
                    <strong>Question 14.</strong> <br/><br/>
                    <li>
                         Have you experienced weight gain or weight loss that you suspect is due to stress, or are you storing more fat in your belly lately?
                    </li>
                </div>
                <div>
                    <input type="radio" name="4work" ident="0"/> &nbsp;Yes, I find that my body's shape has changed, and I'm wondering if it's due to stress<br/>
                    <input type="radio" name="4work" ident="5"/> &nbsp;No, I don't think I've experienced stress-related weight changes.<br/>
                </div> <br/><br/>
                <div>
                    <input type="button" value="Next" name="buttonQuestion" class="btn btn-default" ident="15"/>
                </div>
            </div>
            <div id="question15" name="question">
                <div ident1="comunication" ident2="15" style="font-size: 20px">
                    <strong>Question 15.</strong> <br/><br/>
                    <li>
                         Are you experiencing adult acne that may be related to stress?
                    </li>
                </div>
                <div>
                    <input type="radio" name="5work" ident="0"/> &nbsp;Yes, I've had an acne flare-up on my face or body.<br/>
                    <input type="radio" name="5work" ident="5"/> &nbsp;No, acne hasn't been a problem for me since high school.<br/>
                </div> <br/><br/>
                <div>
                    <input type="button" value="Next" name="buttonQuestion" class="btn btn-default" ident="16"/>
                </div>
            </div>
            <!--*****-->
            <!--Leader ship-->
            <div id="question16" name="question">
                <div ident1="leader" ident2="16" style="font-size: 20px">
                    <strong>Question 16.</strong> <br/><br/>
                    <li>
                         According to your beliefs and understanding, one thing a leader in charge of a team should do is:
                    </li>
                </div>
                <div>
                    <input type="radio" name="1leader" ident="5"/> &nbsp;Dictate to others what should be done and how because he knows it best<br/>
                    <input type="radio" name="1leader" ident="3"/> &nbsp;Allow free exchange of ideas and offer encouragement to support ideas<br/>
                    <input type="radio" name="1leader" ident="0"/> &nbsp;Not interfere at all with the team’s activities as his/her workload is extensive and there are other things to do<br/>
                </div> <br/><br/>
                <div>
                    <input type="button" value="Next" name="buttonQuestion" class="btn btn-default" ident="17"/>
                </div>
            </div>
            <div id="question17" name="question">
                <div ident1="leader" ident2="17" style="font-size: 20px">
                    <strong>Question 17.</strong> <br/><br/>
                    <li>
                         According to your beliefs and understanding, a leader’s primary function is to:
                    </li>
                </div>
                <div>
                    <input type="radio" name="2leader" ident="5"/> &nbsp;Influence other people<br/>
                    <input type="radio" name="2leader" ident="3"/> &nbsp;Create a clear mission statement and objectives<br/>
                    <input type="radio" name="2leader" ident="0"/> &nbsp;Overcome the conflicts and challenges that arise during the course of a normal day, project etc<br/>
                </div> <br/><br/>
                <div>
                    <input type="button" value="Next" name="buttonQuestion" class="btn btn-default" ident="18"/>
                </div>
            </div>
            <div id="question18" name="question">
                <div ident1="leader" ident2="18" style="font-size: 20px">
                    <strong>Question 18.</strong> <br/><br/>
                    <li>
                         According to your beliefs and understanding, the easiest way to gain more leadership skills would be to:
                    </li>
                </div>
                <div>
                    <input type="radio" name="3leader" ident="5"/> &nbsp;Enroll in a formal leadership training course<br/>
                    <input type="radio" name="3leader" ident="3"/> &nbsp;Be the best manager one can possibly be<br/>
                    <input type="radio" name="3leader" ident="0"/> &nbsp;Take charge of more challenging assignments<br/>
                </div> <br/><br/>
                <div>
                    <input type="button" value="Next" name="buttonQuestion" class="btn btn-default" ident="19"/>
                </div>
            </div>
            <div id="question19" name="question">
                <div ident1="leader" ident2="19" style="font-size: 20px">
                    <strong>Question 19.</strong> <br/><br/>
                    <li>
                         According to your beliefs and understanding, the vision of an effective leader should be:
                    </li>
                </div>
                <div>
                    <input type="radio" name="4leader" ident="5"/> &nbsp;Simple and straight to the point<br/>
                    <input type="radio" name="4leader" ident="3"/> &nbsp;Stratospheric and unreachable<br/>
                    <input type="radio" name="4leader" ident="0"/> &nbsp;Ambiguous and unfocused so others can adapt it to their own agendas and style of work<br/>
                </div> <br/><br/>
                <div>
                    <input type="button" value="Next" name="buttonQuestion" class="btn btn-default" ident="20"/>
                </div>
            </div>
            <div id="question20" name="question">
                <div ident1="leader" ident2="20" style="font-size: 20px">
                    <strong>Question 20.</strong> <br/><br/>
                    <li>
                         According to your beliefs and understanding, the following is not a characteristic of an effective leader:
                    </li>
                </div>
                <div>
                    <input type="radio" name="5leader" ident="5"/> &nbsp;A great sense of humor<br/>
                    <input type="radio" name="5leader" ident="3"/> &nbsp;Excellent listening Skills<br/>
                    <input type="radio" name="5leader" ident="0"/> &nbsp;Loathing uncertainty<br/>
                </div> <br/><br/>
                <div>
                    <input type="button" value="Next" name="buttonQuestion" class="btn btn-default" ident="21"/>
                </div>
            </div>
            <!--*****-->
            <!--Initiative-->
            <div id="question21" name="question">
                <div ident1="initiative" ident2="21" style="font-size: 20px">
                    <strong>Question 21.</strong> <br/><br/>
                    <li>
                         Unexpected surprises irritate me.
                    </li>
                </div>
                <div>
                    <input type="radio" name="1initiative" ident="5"/> &nbsp;True<br/>
                    <input type="radio" name="1initiative" ident="0"/> &nbsp;False<br/>
                </div> <br/><br/>
                <div>
                    <input type="button" value="Next" name="buttonQuestion" class="btn btn-default" ident="22"/>
                </div>
            </div>
            <div id="question22" name="question">
                <div ident1="initiative" ident2="22" style="font-size: 20px">
                    <strong>Question 22.</strong> <br/><br/>
                    <li>
                         I am uncomfortable when there is drama in my workplace.
                    </li>
                </div>
                <div>
                    <input type="radio" name="2initiative" ident="5"/> &nbsp;True<br/>
                    <input type="radio" name="2initiative" ident="0"/> &nbsp;False<br/>
                </div> <br/><br/>
                <div>
                    <input type="button" value="Next" name="buttonQuestion" class="btn btn-default" ident="23"/>
                </div>
            </div>
            <div id="question23" name="question">
                <div ident1="initiative" ident2="23" style="font-size: 20px">
                    <strong>Question 23.</strong> <br/><br/>
                    <li>
                         I am good at adapting to changing circumstances.
                    </li>
                </div>
                <div>
                    <input type="radio" name="3initiative" ident="5"/> &nbsp;True<br/>
                    <input type="radio" name="3initiative" ident="0"/> &nbsp;False<br/>
                </div> <br/><br/>
                <div>
                    <input type="button" value="Next" name="buttonQuestion" class="btn btn-default" ident="24"/>
                </div>
            </div>
            <div id="question24" name="question">
                <div ident1="initiative" ident2="24" style="font-size: 20px">
                    <strong>Question 24.</strong> <br/><br/>
                    <li>
                         I've been known to stress-out easily.
                    </li>
                </div>
                <div>
                    <input type="radio" name="4initiative" ident="5"/> &nbsp;True<br/>
                    <input type="radio" name="4initiative" ident="0"/> &nbsp;False<br/>
                </div> <br/><br/>
                <div>
                    <input type="button" value="Next" name="buttonQuestion" class="btn btn-default" ident="25"/>
                </div>
            </div>
            <div id="question25" name="question">
                <div ident1="initiative" ident2="25" style="font-size: 20px">
                    <strong>Question 25.</strong> <br/><br/>
                    <li>
                         I get bored very easily.
                    </li>
                </div>
                <div>
                    <input type="radio" name="5initiative" ident="5"/> &nbsp;True<br/>
                    <input type="radio" name="5initiative" ident="0"/> &nbsp;False<br/>
                </div> <br/><br/>
                <div>
                    <input type="button" value="Save Questions" name="Save" ident="26"/>
                </div>
            </div>
            <!--*****-->
        <br/><br/><br/>
    </div>
    <input type="hidden" id="url" value="<?php echo base_url(); ?>"/>
</body>

<?php
    } else {
        include 'error.php';
    }
?>