    
    {include file='application/views/admincp/header.tpl'}
    {include file='application/views/admincp/bars.tpl'}
      <!-- Container -->
    <div id="container">
        
       
        
        <!-- Form -->
        <form class="form" action="" enctype="multipart/form-data" method="POST">
            <fieldset>
            <legend>إعدادات الموقع</legend>
            
                <p>
                    <label>عنوان الموقع</label>
                    <input type="text" name="app_name" value="{$options.app_name}" />
                    </p>
                
                <p>
                <p>
                    <label>وصف الموقع:</label>
                    <textarea rows="10" name="app_desc">{$options.app_desc}</textarea>
                    </p>
                
                <p>
                <p>
                    <label>الكلمات المفتاحية : </label>
                    <textarea rows="10" name="app_keywords">{$options.app_keywords}</textarea>
                    </p>
                
                
                
                
                <p>
                    <label>App Name</label>
                    <input type="text" name="app_nam_en" value="{$options.app_name_en}" />
                    </p>
                
                <p>
                <p>
                    <label>App Description:</label>
                    <textarea rows="10" name="app_desc_en">{$options.app_desc_en}</textarea>
                    </p>
                
                <p>
                <p>
                    <label>App Keywords : </label>
                    <textarea rows="10" name="app_keywords_en">{$options.app_keywords_en}</textarea>
                    </p>
                
                
                
                
               
                
                
                
                
                <p>
                    <label>&nbsp;</label>
                    <input type="submit" value="تحديث" />
                     
                </p>
            </fieldset>
        </form>  
        <!-- End Of Form -->  
        
    </div>
    <!-- End Of Container -->
    
{include file='application/views/admincp/footer.tpl'}