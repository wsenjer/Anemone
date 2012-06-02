    
    {include file='application/views/admincp/header.tpl'}
    {include file='application/views/admincp/bars.tpl'}
      <!-- Container -->
    <div id="container">
    <br/>
       <a href="{$BASE_URL}admincp/{$action}/add/"> <span class="button green" >إضافة مدير <img src="{$BASE_URL}resources/admin/images/icons/add.png"/></span></a>

        <!-- Table -->
        <table class="data">
            <tr>
                <th>الاسم</th>
                <th>اسم المستخدم</th>
                <th>البريد الإلكتروني</th>
                <th>الدور</th>
                <th>تحكم</th>
                
            </tr>
            {foreach $managers as $manager}
            <tr id="{$manager.id}">
                <td>{$manager.name}</td>
                <td>{$manager.username}</td>
                <td>{$manager.email}</td>
            	<td>{$manager.role|replace:'1':'مدير'|replace:'2':'محرر'}</td>
                <td>
                {if $manager.id neq 2}
                <a href="javascript:void(0)" onclick="delete_('{$action}',{$manager.id})"><img src="{$BASE_URL}resources/admin/images/icons/delete.png" alt="حذف" title="حذف" /></a>
              {/if}
               <a href="{$BASE_URL}admincp/{$action}/edit/{$manager.id}"> <img src="{$BASE_URL}resources/admin/images/icons/edit.png" alt="تعديل" title="تعديل" /></a>
                </td>
                
            </tr>
            {/foreach}
        </table>
        <!-- End Of Table -->
        
         
        
    </div>
    <!-- End Of Container -->
    {include file='application/views/admincp/ajax.tpl'}
{include file='application/views/admincp/footer.tpl'}