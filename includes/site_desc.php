
<?php $actual_link = "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        $default_desc = 'BBS Queen : Where web developers and designers learn and share how to design websites, build mobile applications, create WordPress themes, write code, HTML, JavaScript,...';

        $keyword_tag = '<meta name="keywords" content="BBS, Queen, BBS-Queen, Forum, Boards, board, topics, tocic, posts, post, developers, designers, discution, share, team, message">';


            if( $actual_link == 'https://'.$_SERVER["HTTP_HOST"].'/' ){
            echo '<meta name="description" content="'.$default_desc.'">';
            echo '<title>'.$SITENAME. '   - Home - '.$_SERVER["HTTP_HOST"].'</title>';
            echo $keyword_tag;
        }elseif( $actual_link == 'https://'.$_SERVER["HTTP_HOST"].'/member.php' ){
            echo '<meta name="description" content="'.$default_desc.'">';
            echo '<title>Members List   - ' . $SITENAME.' - '.$_SERVER["HTTP_HOST"].'</title>';
            echo $keyword_tag;
        }elseif( $actual_link == 'https://'.$_SERVER["HTTP_HOST"].'/contact.php' ){
            echo '<meta name="description" content="'.$default_desc.'">';
            echo '<title>Contact Us - ' . $SITENAME.' - '.$_SERVER["HTTP_HOST"].'</title>';
            echo $keyword_tag;
        }elseif( $actual_link == 'https://'.$_SERVER["HTTP_HOST"].'/team.php' ){
            echo '<meta name="description" content="'.$default_desc.'">';
            echo '<title>The Team - ' . $SITENAME.' - '.$_SERVER["HTTP_HOST"].'</title>';
            echo $keyword_tag;
        }elseif( $actual_link == 'https://'.$_SERVER["HTTP_HOST"].'/profile.php' ){
            echo '<meta name="description" content="'.$default_desc.'">';
            echo '<title>My Profile - ' . $SITENAME.' - '.$_SERVER["HTTP_HOST"].'</title>';
            echo $keyword_tag;
        }elseif( $actual_link == 'https://'.$_SERVER["HTTP_HOST"].'/terms.php' ){
            echo '<meta name="description" content="'.$default_desc.'">';
            echo '<title>Terms - ' . $SITENAME.'</title>';
            echo $keyword_tag;
        }elseif( $actual_link == 'https://'.$_SERVER["HTTP_HOST"].'/policy.php' ){
            echo '<meta name="description" content="'.$default_desc.'">';
            echo '<title>Privacy policy - ' . $SITENAME.' - '.$_SERVER["HTTP_HOST"].'</title>';
            echo $keyword_tag;
        }elseif( $actual_link == 'https://'.$_SERVER["HTTP_HOST"].'/member.php' ){
            echo '<meta name="description" content="'.$default_desc.'">';
            echo '<title>Members List - ' . $SITENAME.' - '.$_SERVER["HTTP_HOST"].'</title>';
            echo $keyword_tag;
        }elseif (strpos($actual_link, 'https://'.$_SERVER["HTTP_HOST"].'/member.php?view_user_id') !== false) {
            echo '<meta name="description" content="'.$default_desc.'">';
            echo '<title>View Member Profile - ' . $SITENAME.' - '.$_SERVER["HTTP_HOST"].'</title>';
            echo $keyword_tag;
        }elseif( $actual_link == 'https://'.$_SERVER["HTTP_HOST"].'/lostpwd.php' ){
            echo '<meta name="description" content="'.$default_desc.'">';
            echo '<title>Password Lost ??? - ' . $SITENAME.' - '.$_SERVER["HTTP_HOST"].'</title>';
            echo $keyword_tag;
        }elseif (strpos($actual_link, 'https://'.$_SERVER["HTTP_HOST"].'/board_is_secret.php') !== false) {
            echo '<meta name="description" content="'.$default_desc.'">';
            echo '<title>Board is secret - ' . $SITENAME.' - '.$_SERVER["HTTP_HOST"].'</title>';
            echo $keyword_tag;
        }elseif( $actual_link == 'https://'.$_SERVER["HTTP_HOST"].'/signup.php' ){
            echo '<meta name="description" content="'.$default_desc.'">';
            echo '<title>SignUp - ' . $SITENAME.' - '.$_SERVER["HTTP_HOST"].'</title>';
            echo $keyword_tag;
        }elseif (strpos($actual_link, 'https://'.$_SERVER["HTTP_HOST"].'/msg.php') !== false) {
            echo '<meta name="description" content="'.$default_desc.'">';
            echo '<title>My Private Message - ' . $SITENAME.' - '.$_SERVER["HTTP_HOST"].'</title>';
            echo $keyword_tag;
        }elseif (strpos($actual_link, 'https://'.$_SERVER["HTTP_HOST"].'/login.php') !== false) {
            echo '<meta name="description" content="'.$default_desc.'">';
            echo '<title>Login - ' . $SITENAME.' - '.$_SERVER["HTTP_HOST"].'</title>';
            echo $keyword_tag;
        }


        
        

        elseif (strpos($actual_link, 'https://'.$_SERVER["HTTP_HOST"].'/announce.php') !== false) {
            $ann_id = $_GET['id'];
            $select_Ann = $conn->prepare("SELECT ann_subject, ann_content FROM announce where ann_id=$ann_id LIMIT 1");
            $select_Ann->setFetchMode(PDO::FETCH_ASSOC);
            $select_Ann->execute();
            $data_Sel_Ann=$select_Ann->fetch();
            echo '<meta name="description" content="BBS-Queen Announcement: '.$data_Sel_Ann['ann_subject'].' '.$data_Sel_Ann['ann_content'].'.">';
            echo '<title>Announcement : '.$data_Sel_Ann['ann_subject'].'  -  ' . $SITENAME.' - '.$_SERVER["HTTP_HOST"].'</title>';
            echo $keyword_tag;
        }
        
        
        



        elseif (strpos($actual_link, 'https://'.$_SERVER["HTTP_HOST"].'/topics.php') !== false) {
            $brd_id = $_GET['id'];
            $select_board = $conn->prepare("SELECT board_name FROM boards where board_id=$brd_id LIMIT 1");
            $select_board->setFetchMode(PDO::FETCH_ASSOC);
            $select_board->execute();
            $data_Sel_Board=$select_board->fetch();
            echo '<meta name="description" content="all discussion of the board '.$data_Sel_Board['board_name'].'.">';
            echo '<title>Boards : '.$data_Sel_Board['board_name'].'  -  ' . $SITENAME.' - '.$_SERVER["HTTP_HOST"].'</title>';
            echo $keyword_tag;
        }elseif (strpos($actual_link, 'https://'.$_SERVER["HTTP_HOST"].'/comments.php') !== false) {
            $topic_id = $_GET['id'];
            $select_topic = $conn->prepare("SELECT topic_subject,topic_board FROM topics where topic_id=$topic_id LIMIT 1");
            $select_topic->setFetchMode(PDO::FETCH_ASSOC);
            $select_topic->execute();
            $data_Sel_topic=$select_topic->fetch();
            $_SESSION['BOARDID_formSITESET'] = $data_Sel_topic['topic_board'];

            $select_1stpost = $conn->prepare("SELECT post_content FROM posts where post_topic=$topic_id LIMIT 1");
            $select_1stpost->setFetchMode(PDO::FETCH_ASSOC);
            $select_1stpost->execute();
            $data_Sel_1stpost=$select_1stpost->fetch();

            echo '<meta name="description" content="'.$data_Sel_1stpost['post_content'].'">';
            echo '<title>Topic : '.$data_Sel_topic['topic_subject'].' - ' . $SITENAME.' - '.$_SERVER["HTTP_HOST"].'</title>';
            echo $keyword_tag;
        }


        

        


?>