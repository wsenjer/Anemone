{if $controller neq 'admincp'}
    {include file='application/views/layout/header.tpl'}
{/if}



{$content|to_charset:'UTF-8'}

{if $controller neq 'admincp'}
   {include file='application/views/layout/footer.tpl'}
{/if}



