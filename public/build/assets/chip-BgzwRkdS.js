import{l as e,o as t}from"./button-C5NKRmMW.js";import{Sn as n,_n as r,c as i,dn as a,nn as o,rn as s,tn as c,ur as l,yn as u}from"./app-Bgif3YTa.js";import{n as d}from"./toast-Ds-wRZE4.js";var f=i.extend({name:`chip`,style:`
    .p-chip {
        display: inline-flex;
        align-items: center;
        background: dt('chip.background');
        color: dt('chip.color');
        border-radius: dt('chip.border.radius');
        padding-block: dt('chip.padding.y');
        padding-inline: dt('chip.padding.x');
        gap: dt('chip.gap');
    }

    .p-chip-icon {
        color: dt('chip.icon.color');
        font-size: dt('chip.icon.size');
        width: dt('chip.icon.size');
        height: dt('chip.icon.size');
    }

    .p-chip-image {
        border-radius: 50%;
        width: dt('chip.image.width');
        height: dt('chip.image.height');
        margin-inline-start: calc(-1 * dt('chip.padding.y'));
    }

    .p-chip:has(.p-chip-remove-icon) {
        padding-inline-end: dt('chip.padding.y');
    }

    .p-chip:has(.p-chip-image) {
        padding-block-start: calc(dt('chip.padding.y') / 2);
        padding-block-end: calc(dt('chip.padding.y') / 2);
    }

    .p-chip-remove-icon {
        cursor: pointer;
        font-size: dt('chip.remove.icon.size');
        width: dt('chip.remove.icon.size');
        height: dt('chip.remove.icon.size');
        color: dt('chip.remove.icon.color');
        border-radius: 50%;
        transition:
            outline-color dt('chip.transition.duration'),
            box-shadow dt('chip.transition.duration');
        outline-color: transparent;
    }

    .p-chip-remove-icon:focus-visible {
        box-shadow: dt('chip.remove.icon.focus.ring.shadow');
        outline: dt('chip.remove.icon.focus.ring.width') dt('chip.remove.icon.focus.ring.style') dt('chip.remove.icon.focus.ring.color');
        outline-offset: dt('chip.remove.icon.focus.ring.offset');
    }
`,classes:{root:`p-chip p-component`,image:`p-chip-image`,icon:`p-chip-icon`,label:`p-chip-label`,removeIcon:`p-chip-remove-icon`}}),p={name:`Chip`,extends:{name:`BaseChip`,extends:t,props:{label:{type:[String,Number],default:null},icon:{type:String,default:null},image:{type:String,default:null},removable:{type:Boolean,default:!1},removeIcon:{type:String,default:void 0}},style:f,provide:function(){return{$pcChip:this,$parentInstance:this}}},inheritAttrs:!1,emits:[`remove`],data:function(){return{visible:!0}},methods:{onKeydown:function(e){(e.key===`Enter`||e.key===`Backspace`)&&this.close(e)},close:function(e){this.visible=!1,this.$emit(`remove`,e)}},computed:{dataP:function(){return e({removable:this.removable})}},components:{TimesCircleIcon:d}},m=[`aria-label`,`data-p`],h=[`src`];function g(e,t,i,d,f,p){return f.visible?(r(),s(`div`,a({key:0,class:e.cx(`root`),"aria-label":e.label},e.ptmi(`root`),{"data-p":p.dataP}),[u(e.$slots,`default`,{},function(){return[e.image?(r(),s(`img`,a({key:0,src:e.image},e.ptm(`image`),{class:e.cx(`image`)}),null,16,h)):e.$slots.icon?(r(),c(n(e.$slots.icon),a({key:1,class:e.cx(`icon`)},e.ptm(`icon`)),null,16,[`class`])):e.icon?(r(),s(`span`,a({key:2,class:[e.cx(`icon`),e.icon]},e.ptm(`icon`)),null,16)):o(``,!0),e.label===null?o(``,!0):(r(),s(`div`,a({key:3,class:e.cx(`label`)},e.ptm(`label`)),l(e.label),17))]}),e.removable?u(e.$slots,`removeicon`,{key:0,removeCallback:p.close,keydownCallback:p.onKeydown},function(){return[(r(),c(n(e.removeIcon?`span`:`TimesCircleIcon`),a({class:[e.cx(`removeIcon`),e.removeIcon],onClick:p.close,onKeydown:p.onKeydown},e.ptm(`removeIcon`)),null,16,[`class`,`onClick`,`onKeydown`]))]}):o(``,!0)],16,m)):o(``,!0)}p.render=g;export{p as t};