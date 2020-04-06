(function()
{
    window.templateCompilator={compile:function(e,n){for(let o in n)e=e.replace(new RegExp("{{"+o+"}}","g"),n[o]);return e}};
})();