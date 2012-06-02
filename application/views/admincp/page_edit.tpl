    
    {include file='application/views/admincp/header.tpl'}
    {include file='application/views/admincp/bars.tpl'}
      <!-- Container -->
    <div id="container">
        
       
        
        <!-- Form -->
        <form class="form" action="" enctype="multipart/form-data" method="POST">
            <fieldset>
            <legend>تعديل صفحة</legend>
            
                <p>
                    <label>Page Name:</label>
                    <input type="text" name="name" value="{$page.name}" />
                    </p>
                
                <p>
                
                <p>
                    <label>Page Items</label><br /><br />
                    <textarea rows="15" style="width:450px;" name="content">{$page.content}</textarea>
                    </p>
                
                
                <p>
                    <label>اسم الصفحة :</label>
                    <input type="text" name="ar_name" value="{$page.ar_name}" />
                    </p>
                
                <p>
                
                <p>
                    <label>عناصر الصفحة</label><br /><br />
                    <textarea rows="15" style="width:450px;" name="ar_content">{$page.ar_content}</textarea>
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