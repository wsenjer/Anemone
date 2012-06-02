     <!-- Horizontal Menu -->
        <div id="menu">
            <ul>
                <li><a href="#" {if $action eq 'home'}class="active"{/if}>الرئيسية</a></li>
                <li><a href="{$BASE_URL}admincp/managers" {if $action eq 'managers'}class="active"{/if}>المدراء</a></li>
                <li><a href="{$BASE_URL}admincp/options" {if $action eq 'options'}class="active"{/if}>إعدادات الموقع</a></li>
               
            </ul>
        </div>
        <!-- End Of Horizontal Menu -->
        
        <!-- Sidebar (Vertical Menu) -->
        <div id="sidebar">
            <ul>
             
                <li><a href="{$BASE_URL}admincp/pages" {if $action eq 'pages'}class="active"{/if}>الصفحات</a></li>
                <li><a href="{$BASE_URL}admincp/lists" {if $action eq 'lists'}class="active"{/if}>القوائم</a></li>
                <li><a href="{$BASE_URL}admincp/members" {if $action eq 'members'}class="active"{/if}>الأعضاء</a></li>
                <li><a href="{$BASE_URL}admincp/tags" {if $action eq 'tags'}class="active"{/if}>الأوسمة</a></li>
              
              
            </ul>
        </div>
        <!-- End Of Sidebar -->
        
