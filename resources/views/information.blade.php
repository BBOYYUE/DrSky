<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="/css/app.css" />
    <!--link rel="stylesheet" type="text/css" href="/css/DrSky.css"/-->
    <script src="/js/app.js"></script>
  
    <!-- Bootstrap CSS -->

    <title>萌向星空-资料库</title>
    <style>

    #mymenu{
        display: none;
    }

    .sidebar_list{
        display:block;
    }
    .card{
        max-width: 15rem;
        margin:.5rem 1rem 0 1rem;
    }
    a{
        text-decoration: none;
        text-decoration:none
    }
@media only screen and (max-width:780px){
    .card{
        max-width:100%;
        margin:.5rem 1rem 0 1rem;
    }
    #mymenu{
        display: block;
    }
    .sidebar_list{
        display:none;
    }
}
        </style>
 </head>
  <body>
        <header class="navbar  flex-column flex-md-row bd-navbar">
            <div class="navbar-nav-scroll">
            <ul class="nav  flex-rows">
                <li class="nav-item">
                    <a class="nav-link active" href="#">技能树</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">资料库</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">文档库</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">代码库</a>
                </li>
            </ul>
            </div>
            <ul class="navbar-nav flex-row">
                <li class="nav-item" href="#"><h4>萌向星空</h4></li>
            </ul>
            <a class="dropdown-toggle" id="mymenu"></a>
        </header>
                <span class="caret"></span>
        <div class="container-fluid">
            <div class="row flex-xl-nowap">
                <div id="sidebar" class="col-12 col-md-3 col-xl-2">
                    <form>
                        <input class="form-control" type="text" placeholder="搜索框">
                    </form>
                    <div class="sidebar_list">
                        <ul class="list-group">
  <li class="list-group-item list-group-item-action list-group-item-primary"><a href=".">首页</a></li>
  <li class="list-group-item list-group-item-action list-group-item-primary"><a href="/AdminView">管理页</a></li>
  <li class="list-group-item list-group-item-action list-group-item-primary">按a-z字母顺序排序</li>
  <li class="list-group-item list-group-item-action list-group-item-primary">按更新日期排序</li>
  <li class="list-group-item list-group-item-action list-group-item-primary">按浏览量排序</li>
  <li class="list-group-item list-group-item-action list-group-item-primary">按收藏量排序</li>
</ul>
                </div>
                </div>
                <main  class="col-12 col-md-9 col-xl-10 py-md-3 pl-md-5 bd-content">
                    <div class="row" id="content"></div>
                    
                </main>
            </div>
        </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

  </body>
<script type="text/javascript">
    $("#mymenu").click(function(){
        //$('.sidebar_list').css('display','block') ;
        $('.sidebar_list').fadeToggle(1000);
    })
             $.post('/ShowView/information/content',
                    {
                        'method':'getcontent',
                        '_token':"{{ csrf_token() }}"
                    },
                    function(data,status){
                        console.log(data);
                        data = JSON.parse(data);
                        for (const key in data) {
                                val = data[key];
                                id = val['id'];
                                name = val['name'];
                                title = val['title'];
                                link = val['value'];
                                htm =  "<a href='https://"+link+"'><div id ='"+id+"'class='card text-white bg-primary mb-3'>"+
                                        "<div class='card-header'>"+name+"</div>"+
                                        "<div class='card-body'>"+
                                        "<p class='card-text'>"+title+"</p>"+
                                        "</div>"+
                                        "</div>"+
                                    "</div></a>";
                                $('#content').prepend(htm);
                            
                        }
                    });
    



</script>
 
</html>