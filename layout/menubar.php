<?php 
    include "/system/connect.php";
    $sql = mysqli_query($db,"SELECT * FROM type_service");
    
    while($menu = mysqli_fetch_array($sql)){
        $class[] = $menu['service'];
    }
    //  $class = array('home','sites');
                    
?>
<aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="images/user.png" width="48" height="48" alt="User" />
                </div>
                <?php 
                    $show = mysqli_fetch_array(mysqli_query($db,"SELECT * FROM tbl_member WHERE mid = '$_SESSION[mid]'"));
                ?>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $show['fname']." ".$show['lname'];?></div>
                    <div class="email"><?php echo $_SESSION['mid'];?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">group</i>Followers</a></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>Sales</a></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                <li class="header">MAIN MENU</li>   
                    <li class="<?php echo ($_GET['page']=='allsites' ? "active" : "") ?>">
                        <a href="?page=allsites">
                            <i class="material-icons">text_fields</i>
                            <span>All Sites</span>
                        </a>
                    </li> 
                    <li class="header">TECHNICAL</li>    

                    <li class="<?php if(in_array($_GET['service'],$class)){echo "active";}?>">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">assignment</i>
                            <span>Sites</span>
                        </a>
                        <ul class="ml-menu">
                        <?php                    
                            for ($i=0;$i<count($class);$i++){
                                if($class[$i]==$_GET['service']){
                                    echo '<li class="active">';
                                }else{
                                    echo '<li class="">';
                                } 
                                echo '<a href="?page=sites&service='.$class[$i].'">'.$class[$i].'</a>
                                    </li>';
                            } ?>      
                        </ul>
                    </li>
                    
                <li class="header">SERVICES</li>          
                <!-- <?php                    
                    for ($i=0;$i<count($class);$i++){
                        if($class[$i]==$_GET['service']){
                            echo '<li class="active">';
                        }else{
                            echo '<li class="">';
                        }
                        echo '<a href="?page=sites&service='.$class[$i].'">
                                    <i class="material-icons">filter_'.($i+1).'</i>
                                    <span>'.$class[$i].'</span>
                                </a>
                            </li>';               
                    }
                ?> -->
                
                      <li class="<?php if($_GET['page']=="contactcenter" or $_GET['page']=="service" or $_GET['page']=="department") {echo "active";}?>">
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">settings</i>
                                <span>Setting</span>
                            </a>
                            <ul class="ml-menu">
                                <li class="<?php echo ($_GET['page']=='contactcenter' ? "active" : "") ?>"> 
                                    <a href="?page=contactcenter">ศูนย์บริการลูกค้า</a>
                                </li>
                                <li class="<?php echo ($_GET['page']=='service' ? "active" : "") ?>"> 
                                    <a href="?page=service">รูปแบบบริการ</a>
                                </li>
                                <li class="<?php echo ($_GET['page']=='department' ? "active" : "") ?>"> 
                                    <a href="?page=department">ประเภทหน่วยงาน</a>
                                </li>
                            </ul>
                        </li>
                    
                
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <!-- <div class="legal">
                <div class="copyright">
                    &copy; 2016 - 2017 <a href="javascript:void(0);">AdminBSB - Material Design</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.5
                </div>
            </div> -->
            <!-- #Footer -->
        </aside>