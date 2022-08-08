define(['uiComponent'], function(Component){
'use strict';

return Component.extend({
defaults: {
},
initialize: function(){
this._super();
console.log(this.name + " has been initialized.");
},
showMessage: function(){
return this.subtotal > 100
}
})
});
