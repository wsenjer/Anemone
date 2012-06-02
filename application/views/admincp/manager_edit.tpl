    
    {include file='application/views/admincp/header.tpl'}
    {include file='application/views/admincp/bars.tpl'}
      <!-- Container -->
    <div id="container">
        
       
        
        <!-- Form -->
        <form class="form" action="" enctype="multipart/form-data" method="POST">
            <fieldset>
            <legend>تعديل معلومات مدير</legend>
            
                <p>
                    <label>الاسم :</label>
                    <input type="text" name="name" value="{$manager.name}" />
                    </p>
                
                <p>
                <p>
                    <label>اسم المستخدم :</label>
                    <input type="text" name="username" value="{$manager.username}" />
                    </p>
                
                <p>
                <p>
                    <label>كلمة مرور جديدة :</label>
                    <input type="text" name="password"  />
                    </p>
                
                <p>
                <p>
                    <label>البريد الإلكتروني :</label>
                    <input type="text" name="email" value="{$manager.email}" />
                    </p>
                
                <p>
                    <label>الدور:</label>
                    <select name="role">
                        <option {if $manager.role eq 1} selected="selected"{/if} value="1">مدير</option>
                        <option value="2" {if $manager.role eq 2}selected="selected"{/if}>محرر</option>
                    </select>
                </p>
                
                
                
                
                <p>
                    <label>&nbsp;</label>
                    <input type="submit" value="حفظ التعديلات" />
                     <input type="submit" onclick="window.location='{$BASE_URL}admincp/{$action}/';return false;" value="إلغاء" />
                </p>
            </fieldset>
        </form>  
        <!-- End Of Form -->  
        
    </div>
    <!-- End Of Container -->
    
{include file='application/views/admincp/footer.tpl'}