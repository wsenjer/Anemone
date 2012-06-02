    
    {include file='application/views/admincp/header.tpl'}
      <!-- Container -->
    <div id="container">
        
       
        
        <!-- Form -->
        <form class="form" method="POST" action="">
            <fieldset>
            <legend>تسجيل الدخول</legend>
            
                <p>
                    <label>إسم المستخدم </label>
                    <input type="text" name="username"   />
                    </p>
                
                <p>
                    <label>كلمة السر</label>
                    <input type="password" name="password" autocomplete='false' />
                    </p>
                
                
                
                <p>
                    <label>&nbsp;</label>
                    <input type="submit" value="دخـول" />
                </p>
            </fieldset>
        </form>  
        <!-- End Of Form -->  
        
    </div>
    <!-- End Of Container -->
    
{include file='application/views/admincp/footer.tpl'}