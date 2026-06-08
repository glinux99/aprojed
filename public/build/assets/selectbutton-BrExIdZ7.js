import{l as e,n as t}from"./button-CrTMw00O.js";import{i as n}from"./portal-DermZ3kx.js";import{Dt as r,Zt as i,_n as a,bn as o,c as s,dn as c,en as l,in as u,jt as d,kn as f,rn as p,tn as m,ur as h,vn as g,yn as _}from"./app-DhGsfyOP.js";import{t as v}from"./togglebutton-CuiWyBK6.js";var y=s.extend({name:`selectbutton`,style:`
    .p-selectbutton {
        display: inline-flex;
        user-select: none;
        vertical-align: bottom;
        outline-color: transparent;
        border-radius: dt('selectbutton.border.radius');
    }

    .p-selectbutton .p-togglebutton {
        border-radius: 0;
        border-width: 1px 1px 1px 0;
    }

    .p-selectbutton .p-togglebutton:focus-visible {
        position: relative;
        z-index: 1;
    }

    .p-selectbutton .p-togglebutton:first-child {
        border-inline-start-width: 1px;
        border-start-start-radius: dt('selectbutton.border.radius');
        border-end-start-radius: dt('selectbutton.border.radius');
    }

    .p-selectbutton .p-togglebutton:last-child {
        border-start-end-radius: dt('selectbutton.border.radius');
        border-end-end-radius: dt('selectbutton.border.radius');
    }

    .p-selectbutton.p-invalid {
        outline: 1px solid dt('selectbutton.invalid.border.color');
        outline-offset: 0;
    }

    .p-selectbutton-fluid {
        width: 100%;
    }
    
    .p-selectbutton-fluid .p-togglebutton {
        flex: 1 1 0;
    }
`,classes:{root:function(e){var t=e.props;return[`p-selectbutton p-component`,{"p-invalid":e.instance.$invalid,"p-selectbutton-fluid":t.fluid}]}}}),b={name:`BaseSelectButton`,extends:n,props:{options:Array,optionLabel:null,optionValue:null,optionDisabled:null,multiple:Boolean,allowEmpty:{type:Boolean,default:!0},dataKey:null,ariaLabelledby:{type:String,default:null},size:{type:String,default:null},fluid:{type:Boolean,default:null}},style:y,provide:function(){return{$pcSelectButton:this,$parentInstance:this}}};function x(e,t){var n=typeof Symbol<`u`&&e[Symbol.iterator]||e[`@@iterator`];if(!n){if(Array.isArray(e)||(n=w(e))||t){n&&(e=n);var r=0,i=function(){};return{s:i,n:function(){return r>=e.length?{done:!0}:{done:!1,value:e[r++]}},e:function(e){throw e},f:i}}throw TypeError(`Invalid attempt to iterate non-iterable instance.
In order to be iterable, non-array objects must have a [Symbol.iterator]() method.`)}var a,o=!0,s=!1;return{s:function(){n=n.call(e)},n:function(){var e=n.next();return o=e.done,e},e:function(e){s=!0,a=e},f:function(){try{o||n.return==null||n.return()}finally{if(s)throw a}}}}function S(e){return E(e)||T(e)||w(e)||C()}function C(){throw TypeError(`Invalid attempt to spread non-iterable instance.
In order to be iterable, non-array objects must have a [Symbol.iterator]() method.`)}function w(e,t){if(e){if(typeof e==`string`)return D(e,t);var n={}.toString.call(e).slice(8,-1);return n===`Object`&&e.constructor&&(n=e.constructor.name),n===`Map`||n===`Set`?Array.from(e):n===`Arguments`||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)?D(e,t):void 0}}function T(e){if(typeof Symbol<`u`&&e[Symbol.iterator]!=null||e[`@@iterator`]!=null)return Array.from(e)}function E(e){if(Array.isArray(e))return D(e)}function D(e,t){(t==null||t>e.length)&&(t=e.length);for(var n=0,r=Array(t);n<t;n++)r[n]=e[n];return r}var O={name:`SelectButton`,extends:b,inheritAttrs:!1,emits:[`change`],methods:{getOptionLabel:function(e){return this.optionLabel?d(e,this.optionLabel):e},getOptionValue:function(e){return this.optionValue?d(e,this.optionValue):e},getOptionRenderKey:function(e){return this.dataKey?d(e,this.dataKey):this.getOptionLabel(e)},isOptionDisabled:function(e){return this.optionDisabled?d(e,this.optionDisabled):!1},isOptionReadonly:function(e){if(this.allowEmpty)return!1;var t=this.isSelected(e);return this.multiple?t&&this.d_value.length===1:t},onOptionSelect:function(e,t,n){var i=this;if(!(this.disabled||this.isOptionDisabled(t)||this.isOptionReadonly(t))){var a=this.isSelected(t),o=this.getOptionValue(t),s;if(this.multiple)if(a){if(s=this.d_value.filter(function(e){return!r(e,o,i.equalityKey)}),!this.allowEmpty&&s.length===0)return}else s=this.d_value?[].concat(S(this.d_value),[o]):[o];else{if(a&&!this.allowEmpty)return;s=a?null:o}this.writeValue(s,e),this.$emit(`change`,{originalEvent:e,value:s})}},isSelected:function(e){var t=!1,n=this.getOptionValue(e);if(this.multiple){if(this.d_value){var i=x(this.d_value),a;try{for(i.s();!(a=i.n()).done;){var o=a.value;if(r(o,n,this.equalityKey)){t=!0;break}}}catch(e){i.e(e)}finally{i.f()}}}else t=r(this.d_value,n,this.equalityKey);return t}},computed:{equalityKey:function(){return this.optionValue?null:this.dataKey},dataP:function(){return e({invalid:this.$invalid})}},directives:{ripple:t},components:{ToggleButton:v}},k=[`aria-labelledby`,`data-p`];function A(e,t,n,r,s,d){var v=o(`ToggleButton`);return a(),p(`div`,c({class:e.cx(`root`),role:`group`,"aria-labelledby":e.ariaLabelledby},e.ptmi(`root`),{"data-p":d.dataP}),[(a(!0),p(i,null,g(e.options,function(t,n){return a(),m(v,{key:d.getOptionRenderKey(t),modelValue:d.isSelected(t),onLabel:d.getOptionLabel(t),offLabel:d.getOptionLabel(t),disabled:e.disabled||d.isOptionDisabled(t),unstyled:e.unstyled,size:e.size,readonly:d.isOptionReadonly(t),onChange:function(e){return d.onOptionSelect(e,t,n)},pt:e.ptm(`pcToggleButton`)},u({_:2},[e.$slots.option?{name:`default`,fn:f(function(){return[_(e.$slots,`option`,{option:t,index:n},function(){return[l(`span`,c({ref_for:!0},e.ptm(`pcToggleButton`).label),h(d.getOptionLabel(t)),17)]})]}),key:`0`}:void 0]),1032,[`modelValue`,`onLabel`,`offLabel`,`disabled`,`unstyled`,`size`,`readonly`,`onChange`,`pt`])}),128))],16,k)}O.render=A;export{O as t};