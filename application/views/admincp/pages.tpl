    
    {include file='application/views/admincp/header.tpl'}
    {include file='application/views/admincp/bars.tpl'}
      <!-- Container -->
    <div id="container">
    <br/>
       <a href="{$BASE_URL}admincp/{$action}/add/"> <span class="button green" >إضافة صفحة <img src="{$BASE_URL}resources/admin/images/icons/add.png"/></span></a>

        <!-- Table -->
        <table class="data">
            <tr>
                <th>اسم الصفحة</th>
                
                <th>تحكم</th>
                
            </tr>
            {foreach $pages as $page}
            <tr id="{$page.id}">
                <td>{$page.name}</td>
                
               
            
                <td>
                {if $page.id neq 2 and $page.id neq 1 and $page.id neq 3 and $page.id neq 4 and $page.id neq 5}
                <a href="javascript:void(0)" onclick="delete_('{$action}',{$page.id})"><img src="{$BASE_URL}resources/admin/images/icons/delete.png" alt="حذف" title="حذف" /></a>
              {/if}
               <a href="{$BASE_URL}admincp/{$action}/edit/{$page.id}"> <img src="{$BASE_URL}resources/admin/images/icons/edit.png" alt="تعديل" title="تعديل" /></a>
                </td>
                
            </tr>
            {/foreach}
        </table>
        <!-- End Of Table -->
        
         
        
    </div>
    <!-- End Of Container -->
    {include file='application/views/admincp/ajax.tpl'}
{include file='application/views/admincp/footer.tpl'}