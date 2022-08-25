define([
'uiComponent',
], function(Component){
'use strict';

return Component.extend({
initialize: function(){
this._super();
console.log('The promo component has been loaded successfully.');
},
})
})
