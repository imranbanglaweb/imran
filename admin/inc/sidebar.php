<div class="grid_3">
<div class="box sidemenu">
    <div class="block" id="section-menu">
        <ul class="section menu">
           <li>
            <a class="menuitem">Site Option</a>
                <ul class="submenu">
                    <li>
                        <a href="titleslogan.php">
                            <i class="fa fa-navicon"></i>
                            Title & Slogan
                        </a>
                    </li>
                    <li>
                    <a href="social.php">
                    <i class="fa fa-list" aria-hidden="true">
                    </i>
                        Social Media
                    </a>
                    </li>
                    <li>
                    <a href="copyright.php">
                    <i class="fa fa-copyright" aria-hidden="true">
                    </i>
                    Copyright
                    </a>
                    </li>
                    
                </ul>
            </li>

			<li><a class="menuitem">
            <i class="fa fa-sliders" aria-hidden="true"></i>
            Slider Option</a>
                <ul class="submenu">
                    <li><a href="addslider.php">Add Slider</a> </li>
                    <li><a href="sliderlist.php">Slider List</a> </li>
                </ul>
            </li>
             <li>
             
             <a class="menuitem"><i class="fa fa-home"></i>Pages</a>
                <ul class="submenu">
                <li class="addpage">
                    <a href="addpage.php">Add Page</a>
                </li>
                <li class="pagelist">
                    <a href="pagelist.php">All Page</a>
                </li>
                <?php 
                    $query="SELECT * FROM tbl_page";
                    $page=$dbcon->select($query);
                    if ($page) {
        while ($result=$page->fetch_assoc()) { ?>
                    <li>
                <a href="page.php?pageid=<?php echo $result['id'];?>">
                    <?php echo $result['name'];?>
                </a></li>
                    <?php  }}?>
                </ul>
            </li>
            <li><a class="menuitem">
            <i class="fa fa-pencil" aria-hidden="true"></i>
            Category Option</a>
                <ul class="submenu">
                    <li><a href="addcat.php">Add Category</a> </li>
                    <li><a href="catlist.php">Category List</a> </li>
                </ul>
            </li>
            <li><a class="menuitem">
            <i class="fa fa-edit" aria-hidden="true"></i>
            Post Option</a>
                <ul class="submenu">
                    <li><a href="addpost.php">Add Post</a> </li>
                    <li><a href="postlist.php">Post List</a> </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
</div>