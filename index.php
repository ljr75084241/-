<?php
header('Content-type:text/html;charset:utf-8');
include('./php/shujuku.php');
include('./php/is_login.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="书城网">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>书城网首页</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/general.css">
    <script src="./js/animate.js"></script>
    <script src="./js/index.js"></script>
    <script>
        function del(){
            if(confirm("确定要注销吗？")){
                alert('注销成功！');
                return true;
            }else{
                return false;
            }
        }
    </script>
</head>

<body>
    <div class="zong1">
        <div class="denglu">
            <button class="cha1">X</button>
            <div class="shuru">
                <form action="./php/denglu.php" method="post">
                    <ul id="main">
                        <li><input class="userName" type="text" placeholder="用户名" name="userName"></li>
                        <li><input class="userPwd" type="password" placeholder="密码" name="userPwd"></li>
                        <li><input class="submit" type="submit" value="登录" name="submit1"></li>
                    </ul>
                </form>
                <span class="dl_zc">快速注册</span>
            </div>
        </div>
    </div>
    <div class="zong2">
        <div class="zhuce">
            <button class="cha2">X</button>
            <div class="shuru">
                <form action="./php/zhuce.php" method="post">
                    <ul id="main">
                        <li><input class="userName" type="text" placeholder="用户名" name="userName2"></li>
                        <li><input class="userPwd" type="password" placeholder="密码(不少于6位)" name="userPwd2"></li>
                        <li><input class="userPwd_new" type="password" placeholder="确认密码" name="userPwd_new2"></li>
                        <li><input class="submit" type="submit" value="注册" name="submit2"></li>
                    </ul>
                </form>
                <span class="zc_dl">快速登录</span>
            </div>
        </div>
    </div>
    <div class="tt_wai">
        <div class="tt w">
            <div class="logo">
                <img src="./images/shucheng.com.png" alt="">
            </div>
            <div class="nav">
                <ul>
                    <li><a href="">首页</a></li>
                    <li><a href="php/fenlei.php">分类</a></li>
                </ul>
            </div>
            <div class="search">
                <form action="php/search.php" method="post">
                    <input type="text" name="name_ISBN" class="input" placeholder="请输入需要查找的书名">
                    <input type="submit" class="submit" name="submit" value="搜索">
                </form>
            </div>
            <div class="user">
                <?php
                    if(isset($_COOKIE['user']['name'])){
$user = <<<user
<div class="user11">您好：<a href="php/grzx.php?userName={$_COOKIE['user']['name']}">{$_COOKIE['user']['name']}</a><a href="php/zhuxiao.php" class="zhuxiao" onclick="return del()";>[注销]</a></div>
user;
                       echo $user;
                    }else{
$user1 = <<<user1
<button class="loginD">登录</button>
<button class="loginZ">注册</button>
user1;
                        echo $user1;
                    }
                ?>
            </div>
        </div>
    </div>
    <div class="banner">
        <div class="w">
            <div class="focuse">
                <a href="javascript:;" class="arrow_l">&lt;</a>
                <a href="javascript:;" class="arrow_r">&gt;</a>
                <ul>
                    <li><a href="#"><img src="../../study/images/love2.png" alt=""></a></li>
                    <li><a href="#"><img src="../../study/images/jin2.png" alt=""></a></li>
                    <li><a href="#"><img src="../../study/images/long2.png" alt=""></a></li>
                    <li><a href="#"><img src="../../study/images/shuji2.png" alt=""></a></li>
                </ul>
                <ol class="circle">
                    <!-- <li class="current"></li> -->
                </ol>
            </div>
        </div>
    </div>
    <div class="box w">
        <div class="box_hd">
            <h3>精品推荐</h3>
            <a href="#">查看全部</a>
        </div>
        <div class="box_bd">
            <ul>
				<?php
				$sql = 'select * from book_jingping limit 10';
				$query = connect_query($sql);
				while($data1 = mysqli_fetch_assoc($query)){
$li = <<<A
					<li>
                        <a href="php/xiangqing.php?ISBN={$data1['ISBN']}&sjk=book_jingping">
                            <div class="img">
                                <img src="{$data1['book_pic']}" alt="">
                            </div>
                            <div class="c">
                                <h3>《{$data1['book_name']}》</h3>
                                <p>作者:{$data1['book_author']}</p>
                            </div>
                        </a>
					</li>
A;
					echo $li;
				}
				?>
            </ul>
        </div>
    </div>
    <div class="new w">
        <div class="box_hd">
            <h3>最新发布</h3>
        </div>
        <div class="box_bd">
            <ul>
                <?php
				$sql = 'select * from t_book order by book_time DESC limit 10';
				$query = connect_query($sql);
				while($data = mysqli_fetch_assoc($query)){
$li2 = <<<B
					<li>
                        <a href="php/xiangqing.php?ISBN={$data['ISBN']}&sjk=t_book">
                            <div class="img">
                                <img src="{$data['book_pic']}" alt="">
                            </div>
                            <div class="c">
                                <h3>《{$data['book_name']}》</h3>
                                <p>作者:{$data['book_author']}</p>
                            </div>
                        </a>
					</li>
B;
					echo $li2;
				}
				?>
            </ul>
        </div>
    </div>
    <div class="footer">
        <div class="w">
            <div class="br">
                <div class="br_top"></div>
            </div>
            <div class="footer_con">
                <div class="footer_items">
                    <h3>产品</h3>
                    <ul>
                        <li><a href="#">原型设计</a></li>
                        <li><a href="#">设计系统</a></li>
                        <li><a href="#">全部功能</a></li>
                        <li><a href="#">更新日志</a></li>
                    </ul>
                </div>
                <div class="footer_items">
                    <h3>资源</h3>
                    <ul>
                        <li><a href="#">设计博客</a></li>
                        <li><a href="#">讨论区</a></li>
                        <li><a href="#">设计导航</a></li>
                    </ul>
                </div>
                <div class="footer_items">
                    <h3>服务</h3>
                    <ul>
                        <li><a href="#">解决方案</a></li>
                        <li><a href="#">帮助</a></li>
                        <li><a href="#">用户</a></li>
                    </ul>
                </div>
                <div class="footer_items">
                    <h3>关于</h3>
                    <ul>
                        <li><a href="#">关于我们</a></li>
                        <li><a href="#">走进书城</a></li>
                    </ul>
                </div>
            </div>

            <div class="formate">
                <h2>联系我们</h2>
                <ul>
                    <li>
                        <p>QQ: 75084241</p>
                    </li>
                    <li>
                        <div class="qq">
                            <img src="./images/QQ.jpg" title="QQ">
                        </div>
                    </li>
                    <li>
                        <p>微信: chinling94</p>
                    </li>
                    <li>
                        <div class="weixin">
                            <img src="./images/weixin.jpg" title="微信">
                        </div>
                    </li>
                </ul>
            </div>
            <div class="br_bottom"></div>
        </div>
    </div>
</body>

</html>