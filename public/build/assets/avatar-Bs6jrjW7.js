import{l as e,o as t}from"./button-CKJ0rbS0.js";import{Sn as n,_n as r,ar as i,c as a,dn as o,nn as s,rn as c,tn as l,ur as u,yn as d}from"./app-C-O4ClPr.js";var f=a.extend({name:`avatar`,style:`
    .p-avatar {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: dt('avatar.width');
        height: dt('avatar.height');
        font-size: dt('avatar.font.size');
        background: dt('avatar.background');
        color: dt('avatar.color');
        border-radius: dt('avatar.border.radius');
    }

    .p-avatar-image {
        background: transparent;
    }

    .p-avatar-circle {
        border-radius: 50%;
    }

    .p-avatar-circle img {
        border-radius: 50%;
    }

    .p-avatar-icon {
        font-size: dt('avatar.icon.size');
        width: dt('avatar.icon.size');
        height: dt('avatar.icon.size');
    }

    .p-avatar img {
        width: 100%;
        height: 100%;
    }

    .p-avatar-lg {
        width: dt('avatar.lg.width');
        height: dt('avatar.lg.width');
        font-size: dt('avatar.lg.font.size');
    }

    .p-avatar-lg .p-avatar-icon {
        font-size: dt('avatar.lg.icon.size');
        width: dt('avatar.lg.icon.size');
        height: dt('avatar.lg.icon.size');
    }

    .p-avatar-xl {
        width: dt('avatar.xl.width');
        height: dt('avatar.xl.width');
        font-size: dt('avatar.xl.font.size');
    }

    .p-avatar-xl .p-avatar-icon {
        font-size: dt('avatar.xl.icon.size');
        width: dt('avatar.xl.icon.size');
        height: dt('avatar.xl.icon.size');
    }

    .p-avatar-group {
        display: flex;
        align-items: center;
    }

    .p-avatar-group .p-avatar + .p-avatar {
        margin-inline-start: dt('avatar.group.offset');
    }

    .p-avatar-group .p-avatar {
        border: 2px solid dt('avatar.group.border.color');
    }

    .p-avatar-group .p-avatar-lg + .p-avatar-lg {
        margin-inline-start: dt('avatar.lg.group.offset');
    }

    .p-avatar-group .p-avatar-xl + .p-avatar-xl {
        margin-inline-start: dt('avatar.xl.group.offset');
    }
`,classes:{root:function(e){var t=e.props;return[`p-avatar p-component`,{"p-avatar-image":t.image!=null,"p-avatar-circle":t.shape===`circle`,"p-avatar-lg":t.size===`large`,"p-avatar-xl":t.size===`xlarge`}]},label:`p-avatar-label`,icon:`p-avatar-icon`}}),p={name:`BaseAvatar`,extends:t,props:{label:{type:String,default:null},icon:{type:String,default:null},image:{type:String,default:null},size:{type:String,default:`normal`},shape:{type:String,default:`square`},ariaLabelledby:{type:String,default:null},ariaLabel:{type:String,default:null}},style:f,provide:function(){return{$pcAvatar:this,$parentInstance:this}}};function m(e){"@babel/helpers - typeof";return m=typeof Symbol==`function`&&typeof Symbol.iterator==`symbol`?function(e){return typeof e}:function(e){return e&&typeof Symbol==`function`&&e.constructor===Symbol&&e!==Symbol.prototype?`symbol`:typeof e},m(e)}function h(e,t,n){return(t=g(t))in e?Object.defineProperty(e,t,{value:n,enumerable:!0,configurable:!0,writable:!0}):e[t]=n,e}function g(e){var t=_(e,`string`);return m(t)==`symbol`?t:t+``}function _(e,t){if(m(e)!=`object`||!e)return e;var n=e[Symbol.toPrimitive];if(n!==void 0){var r=n.call(e,t);if(m(r)!=`object`)return r;throw TypeError(`@@toPrimitive must return a primitive value.`)}return(t===`string`?String:Number)(e)}var v={name:`Avatar`,extends:p,inheritAttrs:!1,emits:[`error`],methods:{onError:function(e){this.$emit(`error`,e)}},computed:{dataP:function(){return e(h(h({},this.shape,this.shape),this.size,this.size))}}},y=[`aria-labelledby`,`aria-label`,`data-p`],b=[`data-p`],x=[`data-p`],S=[`src`,`alt`,`data-p`];function C(e,t,a,f,p,m){return r(),c(`div`,o({class:e.cx(`root`),"aria-labelledby":e.ariaLabelledby,"aria-label":e.ariaLabel},e.ptmi(`root`),{"data-p":m.dataP}),[d(e.$slots,`default`,{},function(){return[e.label?(r(),c(`span`,o({key:0,class:e.cx(`label`)},e.ptm(`label`),{"data-p":m.dataP}),u(e.label),17,b)):e.$slots.icon?(r(),l(n(e.$slots.icon),{key:1,class:i(e.cx(`icon`))},null,8,[`class`])):e.icon?(r(),c(`span`,o({key:2,class:[e.cx(`icon`),e.icon]},e.ptm(`icon`),{"data-p":m.dataP}),null,16,x)):e.image?(r(),c(`img`,o({key:3,src:e.image,alt:e.ariaLabel,onError:t[0]||=function(){return m.onError&&m.onError.apply(m,arguments)}},e.ptm(`image`),{"data-p":m.dataP}),null,16,S)):s(``,!0)]})],16,y)}v.render=C;export{v as t};