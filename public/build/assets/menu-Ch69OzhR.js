import{l as e,n as t,o as n}from"./button-CPuKytdE.js";import{o as r,t as i}from"./portal-9wIFGLOt.js";import{An as a,G as o,Ht as s,K as c,R as l,S as u,Sn as d,Z as f,Zt as p,_n as m,ar as h,bn as g,c as _,dn as v,dt as y,en as b,kn as x,kt as S,lt as C,nn as w,on as T,rn as E,sn as D,tn as O,ur as k,vn as A,xn as j,yn as M}from"./app-DVQ3uKMe.js";import{t as N}from"./utils-GWxlfjjX.js";import{t as P}from"./overlayeventbus-CqxhIVDP.js";var F=_.extend({name:`menu`,style:`
    .p-menu {
        background: dt('menu.background');
        color: dt('menu.color');
        border: 1px solid dt('menu.border.color');
        border-radius: dt('menu.border.radius');
        min-width: 12.5rem;
    }

    .p-menu-list {
        margin: 0;
        padding: dt('menu.list.padding');
        outline: 0 none;
        list-style: none;
        display: flex;
        flex-direction: column;
        gap: dt('menu.list.gap');
    }

    .p-menu-item-content {
        transition:
            background dt('menu.transition.duration'),
            color dt('menu.transition.duration');
        border-radius: dt('menu.item.border.radius');
        color: dt('menu.item.color');
        overflow: hidden;
    }

    .p-menu-item-link {
        cursor: pointer;
        display: flex;
        align-items: center;
        text-decoration: none;
        overflow: hidden;
        position: relative;
        color: inherit;
        padding: dt('menu.item.padding');
        gap: dt('menu.item.gap');
        user-select: none;
        outline: 0 none;
    }

    .p-menu-item-label {
        line-height: 1;
    }

    .p-menu-item-icon {
        color: dt('menu.item.icon.color');
    }

    .p-menu-item.p-focus .p-menu-item-content {
        color: dt('menu.item.focus.color');
        background: dt('menu.item.focus.background');
    }

    .p-menu-item.p-focus .p-menu-item-icon {
        color: dt('menu.item.icon.focus.color');
    }

    .p-menu-item:not(.p-disabled) .p-menu-item-content:hover {
        color: dt('menu.item.focus.color');
        background: dt('menu.item.focus.background');
    }

    .p-menu-item:not(.p-disabled) .p-menu-item-content:hover .p-menu-item-icon {
        color: dt('menu.item.icon.focus.color');
    }

    .p-menu-overlay {
        box-shadow: dt('menu.shadow');
    }

    .p-menu-submenu-label {
        background: dt('menu.submenu.label.background');
        padding: dt('menu.submenu.label.padding');
        color: dt('menu.submenu.label.color');
        font-weight: dt('menu.submenu.label.font.weight');
    }

    .p-menu-separator {
        border-block-start: 1px solid dt('menu.separator.border.color');
    }
`,classes:{root:function(e){return[`p-menu p-component`,{"p-menu-overlay":e.props.popup}]},start:`p-menu-start`,list:`p-menu-list`,submenuLabel:`p-menu-submenu-label`,separator:`p-menu-separator`,end:`p-menu-end`,item:function(e){var t=e.instance;return[`p-menu-item`,{"p-focus":t.id===t.focusedOptionId,"p-disabled":t.disabled()}]},itemContent:`p-menu-item-content`,itemLink:`p-menu-item-link`,itemIcon:`p-menu-item-icon`,itemLabel:`p-menu-item-label`}}),I={name:`BaseMenu`,extends:n,props:{popup:{type:Boolean,default:!1},model:{type:Array,default:null},appendTo:{type:[String,Object],default:`body`},autoZIndex:{type:Boolean,default:!0},baseZIndex:{type:Number,default:0},tabindex:{type:Number,default:0},ariaLabel:{type:String,default:null},ariaLabelledby:{type:String,default:null}},style:F,provide:function(){return{$pcMenu:this,$parentInstance:this}}},L={name:`Menuitem`,hostName:`Menu`,extends:n,inheritAttrs:!1,emits:[`item-click`,`item-mousemove`],props:{item:null,templates:null,id:null,focusedOptionId:null,index:null},methods:{getItemProp:function(e,t){return e&&e.item?S(e.item[t]):void 0},getPTOptions:function(e){return this.ptm(e,{context:{item:this.item,index:this.index,focused:this.isItemFocused(),disabled:this.disabled()}})},isItemFocused:function(){return this.focusedOptionId===this.id},onItemClick:function(e){var t=this.getItemProp(this.item,`command`);t&&t({originalEvent:e,item:this.item.item}),this.$emit(`item-click`,{originalEvent:e,item:this.item,id:this.id})},onItemMouseMove:function(e){this.$emit(`item-mousemove`,{originalEvent:e,item:this.item,id:this.id})},visible:function(){return typeof this.item.visible==`function`?this.item.visible():this.item.visible!==!1},disabled:function(){return typeof this.item.disabled==`function`?this.item.disabled():this.item.disabled},label:function(){return typeof this.item.label==`function`?this.item.label():this.item.label},getMenuItemProps:function(e){return{action:v({class:this.cx(`itemLink`),tabindex:`-1`},this.getPTOptions(`itemLink`)),icon:v({class:[this.cx(`itemIcon`),e.icon]},this.getPTOptions(`itemIcon`)),label:v({class:this.cx(`itemLabel`)},this.getPTOptions(`itemLabel`))}}},computed:{dataP:function(){return e({focus:this.isItemFocused(),disabled:this.disabled()})}},directives:{ripple:t}},R=[`id`,`aria-label`,`aria-disabled`,`data-p-focused`,`data-p-disabled`,`data-p`],z=[`data-p`],B=[`href`,`target`],V=[`data-p`],H=[`data-p`];function U(e,t,n,r,i,o){var s=j(`ripple`);return o.visible()?(m(),E(`li`,v({key:0,id:n.id,class:[e.cx(`item`),n.item.class],role:`menuitem`,style:n.item.style,"aria-label":o.label(),"aria-disabled":o.disabled(),"data-p-focused":o.isItemFocused(),"data-p-disabled":o.disabled()||!1,"data-p":o.dataP},o.getPTOptions(`item`)),[b(`div`,v({class:e.cx(`itemContent`),onClick:t[0]||=function(e){return o.onItemClick(e)},onMousemove:t[1]||=function(e){return o.onItemMouseMove(e)},"data-p":o.dataP},o.getPTOptions(`itemContent`)),[n.templates.item?n.templates.item?(m(),O(d(n.templates.item),{key:1,item:n.item,label:o.label(),props:o.getMenuItemProps(n.item)},null,8,[`item`,`label`,`props`])):w(``,!0):a((m(),E(`a`,v({key:0,href:n.item.url,class:e.cx(`itemLink`),target:n.item.target,tabindex:`-1`},o.getPTOptions(`itemLink`)),[n.templates.itemicon?(m(),O(d(n.templates.itemicon),{key:0,item:n.item,class:h(e.cx(`itemIcon`))},null,8,[`item`,`class`])):n.item.icon?(m(),E(`span`,v({key:1,class:[e.cx(`itemIcon`),n.item.icon],"data-p":o.dataP},o.getPTOptions(`itemIcon`)),null,16,V)):w(``,!0),b(`span`,v({class:e.cx(`itemLabel`),"data-p":o.dataP},o.getPTOptions(`itemLabel`)),k(o.label()),17,H)],16,B)),[[s]])],16,z)],16,R)):w(``,!0)}L.render=U;function W(e){return J(e)||q(e)||K(e)||G()}function G(){throw TypeError(`Invalid attempt to spread non-iterable instance.
In order to be iterable, non-array objects must have a [Symbol.iterator]() method.`)}function K(e,t){if(e){if(typeof e==`string`)return Y(e,t);var n={}.toString.call(e).slice(8,-1);return n===`Object`&&e.constructor&&(n=e.constructor.name),n===`Map`||n===`Set`?Array.from(e):n===`Arguments`||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)?Y(e,t):void 0}}function q(e){if(typeof Symbol<`u`&&e[Symbol.iterator]!=null||e[`@@iterator`]!=null)return Array.from(e)}function J(e){if(Array.isArray(e))return Y(e)}function Y(e,t){(t==null||t>e.length)&&(t=e.length);for(var n=0,r=Array(t);n<t;n++)r[n]=e[n];return r}var X={name:`Menu`,extends:I,inheritAttrs:!1,emits:[`show`,`hide`,`focus`,`blur`],data:function(){return{overlayVisible:!1,focused:!1,focusedOptionIndex:-1,selectedOptionIndex:-1}},target:null,outsideClickListener:null,scrollHandler:null,resizeListener:null,container:null,list:null,mounted:function(){this.popup||(this.bindResizeListener(),this.bindOutsideClickListener())},beforeUnmount:function(){this.unbindResizeListener(),this.unbindOutsideClickListener(),this.scrollHandler&&=(this.scrollHandler.destroy(),null),this.target=null,this.container&&this.autoZIndex&&r.clear(this.container),this.container=null},methods:{itemClick:function(e){var t=e.item;this.disabled(t)||(t.command&&t.command(e),this.overlayVisible&&this.hide(),!this.popup&&this.focusedOptionIndex!==e.id&&(this.focusedOptionIndex=e.id))},itemMouseMove:function(e){this.focused&&(this.focusedOptionIndex=e.id)},onListFocus:function(e){this.focused=!0,!this.popup&&this.changeFocusedOptionIndex(0),this.$emit(`focus`,e)},onListBlur:function(e){this.focused=!1,this.focusedOptionIndex=-1,this.$emit(`blur`,e)},onListKeyDown:function(e){switch(e.code){case`ArrowDown`:this.onArrowDownKey(e);break;case`ArrowUp`:this.onArrowUpKey(e);break;case`Home`:this.onHomeKey(e);break;case`End`:this.onEndKey(e);break;case`Enter`:case`NumpadEnter`:this.onEnterKey(e);break;case`Space`:this.onSpaceKey(e);break;case`Escape`:this.popup&&(f(this.target),this.hide());case`Tab`:this.overlayVisible&&this.hide();break}},onArrowDownKey:function(e){var t=this.findNextOptionIndex(this.focusedOptionIndex);this.changeFocusedOptionIndex(t),e.preventDefault()},onArrowUpKey:function(e){if(e.altKey&&this.popup)f(this.target),this.hide(),e.preventDefault();else{var t=this.findPrevOptionIndex(this.focusedOptionIndex);this.changeFocusedOptionIndex(t),e.preventDefault()}},onHomeKey:function(e){this.changeFocusedOptionIndex(0),e.preventDefault()},onEndKey:function(e){this.changeFocusedOptionIndex(o(this.container,`li[data-pc-section="item"][data-p-disabled="false"]`).length-1),e.preventDefault()},onEnterKey:function(e){var t=y(this.list,`li[id="${`${this.focusedOptionIndex}`}"]`),n=t&&y(t,`a[data-pc-section="itemlink"]`);this.popup&&f(this.target),n?n.click():t&&t.click(),e.preventDefault()},onSpaceKey:function(e){this.onEnterKey(e)},findNextOptionIndex:function(e){var t=W(o(this.container,`li[data-pc-section="item"][data-p-disabled="false"]`)).findIndex(function(t){return t.id===e});return t>-1?t+1:0},findPrevOptionIndex:function(e){var t=W(o(this.container,`li[data-pc-section="item"][data-p-disabled="false"]`)).findIndex(function(t){return t.id===e});return t>-1?t-1:0},changeFocusedOptionIndex:function(e){var t=o(this.container,`li[data-pc-section="item"][data-p-disabled="false"]`),n=e>=t.length?t.length-1:e<0?0:e;n>-1&&(this.focusedOptionIndex=t[n].getAttribute(`id`))},toggle:function(e,t){this.overlayVisible?this.hide():this.show(e,t)},show:function(e,t){this.overlayVisible=!0,this.target=t??e.currentTarget},hide:function(){this.overlayVisible=!1,this.target=null},onEnter:function(e){l(e,{position:`absolute`,top:`0`}),this.alignOverlay(),this.bindOutsideClickListener(),this.bindResizeListener(),this.bindScrollListener(),this.autoZIndex&&r.set(`menu`,e,this.baseZIndex||this.$primevue.config.zIndex.menu),this.popup&&f(this.list),this.$emit(`show`)},onLeave:function(){this.unbindOutsideClickListener(),this.unbindResizeListener(),this.unbindScrollListener(),this.$emit(`hide`)},onAfterLeave:function(e){this.autoZIndex&&r.clear(e)},alignOverlay:function(){u(this.container,this.target),C(this.target)>C(this.container)&&(this.container.style.minWidth=C(this.target)+`px`)},bindOutsideClickListener:function(){var e=this;this.outsideClickListener||(this.outsideClickListener=function(t){var n=e.container&&!e.container.contains(t.target),r=!(e.target&&(e.target===t.target||e.target.contains(t.target)));e.overlayVisible&&n&&r?e.hide():!e.popup&&n&&r&&(e.focusedOptionIndex=-1)},document.addEventListener(`click`,this.outsideClickListener,!0))},unbindOutsideClickListener:function(){this.outsideClickListener&&=(document.removeEventListener(`click`,this.outsideClickListener,!0),null)},bindScrollListener:function(){var e=this;this.scrollHandler||=new N(this.target,function(){e.overlayVisible&&e.hide()}),this.scrollHandler.bindScrollListener()},unbindScrollListener:function(){this.scrollHandler&&this.scrollHandler.unbindScrollListener()},bindResizeListener:function(){var e=this;this.resizeListener||(this.resizeListener=function(){e.overlayVisible&&!c()&&e.hide()},window.addEventListener(`resize`,this.resizeListener))},unbindResizeListener:function(){this.resizeListener&&=(window.removeEventListener(`resize`,this.resizeListener),null)},visible:function(e){return typeof e.visible==`function`?e.visible():e.visible!==!1},disabled:function(e){return typeof e.disabled==`function`?e.disabled():e.disabled},label:function(e){return typeof e.label==`function`?e.label():e.label},onOverlayClick:function(e){P.emit(`overlay-click`,{originalEvent:e,target:this.target})},containerRef:function(e){this.container=e},listRef:function(e){this.list=e}},computed:{focusedOptionId:function(){return this.focusedOptionIndex===-1?null:this.focusedOptionIndex},dataP:function(){return e({popup:this.popup})}},components:{PVMenuitem:L,Portal:i}},Z=[`id`,`data-p`],Q=[`id`,`tabindex`,`aria-activedescendant`,`aria-label`,`aria-labelledby`],$=[`id`];function ee(e,t,n,r,i,a){var o=g(`PVMenuitem`),c=g(`Portal`);return m(),O(c,{appendTo:e.appendTo,disabled:!e.popup},{default:x(function(){return[D(s,v({name:`p-anchored-overlay`,onEnter:a.onEnter,onLeave:a.onLeave,onAfterLeave:a.onAfterLeave},e.ptm(`transition`)),{default:x(function(){return[!e.popup||i.overlayVisible?(m(),E(`div`,v({key:0,ref:a.containerRef,id:e.$id,class:e.cx(`root`),onClick:t[3]||=function(){return a.onOverlayClick&&a.onOverlayClick.apply(a,arguments)},"data-p":a.dataP},e.ptmi(`root`)),[e.$slots.start?(m(),E(`div`,v({key:0,class:e.cx(`start`)},e.ptm(`start`)),[M(e.$slots,`start`)],16)):w(``,!0),b(`ul`,v({ref:a.listRef,id:e.$id+`_list`,class:e.cx(`list`),role:`menu`,tabindex:e.tabindex,"aria-activedescendant":i.focused?a.focusedOptionId:void 0,"aria-label":e.ariaLabel,"aria-labelledby":e.ariaLabelledby,onFocus:t[0]||=function(){return a.onListFocus&&a.onListFocus.apply(a,arguments)},onBlur:t[1]||=function(){return a.onListBlur&&a.onListBlur.apply(a,arguments)},onKeydown:t[2]||=function(){return a.onListKeyDown&&a.onListKeyDown.apply(a,arguments)}},e.ptm(`list`)),[(m(!0),E(p,null,A(e.model,function(t,n){return m(),E(p,{key:a.label(t)+n.toString()},[t.items&&a.visible(t)&&!t.separator?(m(),E(p,{key:0},[t.items?(m(),E(`li`,v({key:0,id:e.$id+`_`+n,class:[e.cx(`submenuLabel`),t.class],role:`none`},{ref_for:!0},e.ptm(`submenuLabel`)),[M(e.$slots,e.$slots.submenulabel?`submenulabel`:`submenuheader`,{item:t},function(){return[T(k(a.label(t)),1)]})],16,$)):w(``,!0),(m(!0),E(p,null,A(t.items,function(r,i){return m(),E(p,{key:r.label+n+`_`+i},[a.visible(r)&&!r.separator?(m(),O(o,{key:0,id:e.$id+`_`+n+`_`+i,item:r,templates:e.$slots,focusedOptionId:a.focusedOptionId,unstyled:e.unstyled,onItemClick:a.itemClick,onItemMousemove:a.itemMouseMove,pt:e.pt},null,8,[`id`,`item`,`templates`,`focusedOptionId`,`unstyled`,`onItemClick`,`onItemMousemove`,`pt`])):a.visible(r)&&r.separator?(m(),E(`li`,v({key:`separator`+n+i,class:[e.cx(`separator`),t.class],style:r.style,role:`separator`},{ref_for:!0},e.ptm(`separator`)),null,16)):w(``,!0)],64)}),128))],64)):a.visible(t)&&t.separator?(m(),E(`li`,v({key:`separator`+n.toString(),class:[e.cx(`separator`),t.class],style:t.style,role:`separator`},{ref_for:!0},e.ptm(`separator`)),null,16)):(m(),O(o,{key:a.label(t)+n.toString(),id:e.$id+`_`+n,item:t,index:n,templates:e.$slots,focusedOptionId:a.focusedOptionId,unstyled:e.unstyled,onItemClick:a.itemClick,onItemMousemove:a.itemMouseMove,pt:e.pt},null,8,[`id`,`item`,`index`,`templates`,`focusedOptionId`,`unstyled`,`onItemClick`,`onItemMousemove`,`pt`]))],64)}),128))],16,Q),e.$slots.end?(m(),E(`div`,v({key:1,class:e.cx(`end`)},e.ptm(`end`)),[M(e.$slots,`end`)],16)):w(``,!0)],16,Z)):w(``,!0)]}),_:3},16,[`onEnter`,`onLeave`,`onAfterLeave`])]}),_:3},8,[`appendTo`,`disabled`])}X.render=ee;export{X as t};