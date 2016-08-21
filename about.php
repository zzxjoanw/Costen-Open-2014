<!-- 
    Attributions
    -Home Icon made by Icomoon from <a href="http://www.flaticon.com" title="Flaticon">www.flaticon.com
-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">

        <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
        Remove this if you use the .htaccess -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <title>Cotsen Open 2014 - About</title>
        <meta name="description" content="">
        <meta name="author" content="Laura">
        <meta name="viewport" content="width=device-width; initial-scale=1.0">
        
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        
        <link rel="stylesheet" href="css/screen.css" />
        <link rel="stylesheet" href="css/flipclock.css">
        <link rel="shortcut icon" href="images/favicon.png">
        <link rel="apple-touch-icon" href="/apple-touch-icon.png">
    </head>
    <body>
        <? include 'includes/header.php'; ?>
        <div id="main">
            <div class="container">
                <?
                    switch($_SESSION['lang'])
                    {
                        case 'kr': ?>
                            <div class="row">
                                <div class="panel panel-default">
                                    <div class="panel-heading">폐막식시상식</div>
                                    <div clas="panel-body">
                                        The Cotsen Open은 바둑 애호가인 Eric Cotsen씨가 매년 후원하여 로스엔젤레스에서 개최되는 바둑대회입니다. 금년
                                        대회[토너먼트]는 10월 24일(토)~25일(일), 이틀간 <a href="http://www.lacenterstudios.com/">LA Center Studios</a>에서 개최 예정입니다. 사전 등록한
                                        참가자들에게는 다양한 상품과 경품이 준비되어 있으며 Food Truck 을 통한 무료 점심과 마사지 서비스도
                                        제공될 예정입니다. 또한 중국계 바둑기사인 Yilun Yang 7단을 포함, 여러 프로들의 경기를 관람하실 수 있는
                                        행사들도 준비되어 있습니다. 사전 등록을 한 참가자들에 한해 5 라운드를 모두 마칠 경우 등록비 전액을 환불해
                                        드리므로 꼭 사전에 등록하시기 바랍니다.
                                    </div>
                                </div>
                            </div>
                        <?
                        break;
                        case 'ch': ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">关于比赛</div>
                                <div class="panel-body">
                                    Cotsen围棋公开赛是加州洛杉矶一年一度的围棋赛事, 由围棋爱好者Eric Cotsen 出资主办. 今年的比赛日期是10月24,25两天, 地点:
                                    <a href="http://www.lacenterstudios.com/">LA Center Studios</a>, 洛杉矶. Cotsen 围棋公开赛拥有数千美元奖金,  极具竞争力的公开组, 顶级组的KGS现场直播, 为参赛人员提供免费按摩,
                                    为所有提前注册的棋手们提免费午餐, 职业七段杨以伦将与中国棋院顶级职业棋手在网上下表演棋,
                                    每一位提前注册的并且下完所有5盘的棋手们将会全额退回报名费. 千万不要错过这场美国围棋界盛大的赛事!
                                </div>
                            </div>
                        <?
                        break;
                        /*case 'jp':
                            <div class="panel panel-default">
                                <div class="panel-heading">Japanese header goes here</div>
                                <div class="panel-body">
                                    japanese
                                </div>
                            </div>*/
                        case 'en':
                        default: ?>
                            <div class="row">
                                <div class="panel panel-default">
                                    <div class="panel-heading">About the Tournament</div>
                                    <div class="panel-body">
                                        The Cotsen Open is an annual go tournament, sponsored by go-lover Eric Cotsen, held in Los Angeles, CA.
                                        This year's tournament will be held on October 24-25, 2015 at the
                                        <a href="http://www.lacenterstudios.com/"> LA Center Studios</a>. The Cotsen Open features
                                        thousands of dollars in prizes, an extremely competitive Open Division, live KGS commentary on top board
                                        games, masseuses to massage players during their games, free food truck lunches to all those who
                                        pre-register on both Saturday and Sunday of the tournament, and a demonstration game between Yilun Yang 7p
                                        and another top pro player. And, as always, everyone who pre-registers and plays in all 5 of their matches
                                        has their full entry fee refunded. This tournament is not to be missed!
                                    </div>
                                </div>
                            </div>
                        <?
                        break;
                    }
                ?>
            <div id="images"><img src="images/2014-05.jpg"><img src="images/2014-06.jpg"></div>
        </div>
    </body>
</html>