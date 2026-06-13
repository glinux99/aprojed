import{n as e,o as t}from"./button-CaUk2oRp.js";import{An as n,Dt as r,F as i,Jt as a,L as o,Sn as s,Z as c,Zt as l,_n as u,ar as d,c as f,dn as p,dt as m,en as h,k as g,kn as _,nn as v,rn as y,tn as b,ur as x,vn as S,xn as C,yn as w}from"./app-BXLH0-50.js";import{t as T}from"./chevronleft-D4SGm2fW.js";import{t as E}from"./chevronright-DMJ_ZtcL.js";var D=f.extend({name:`tabview`,style:`
    .p-tabview-tablist-container {
        position: relative;
    }

    .p-tabview-scrollable > .p-tabview-tablist-container {
        overflow: hidden;
    }

    .p-tabview-tablist-scroll-container {
        overflow-x: auto;
        overflow-y: hidden;
        scroll-behavior: smooth;
        scrollbar-width: none;
        overscroll-behavior: contain auto;
    }

    .p-tabview-tablist-scroll-container::-webkit-scrollbar {
        display: none;
    }

    .p-tabview-tablist {
        display: flex;
        margin: 0;
        padding: 0;
        list-style-type: none;
        flex: 1 1 auto;
        background: dt('tabview.tab.list.background');
        border: 1px solid dt('tabview.tab.list.border.color');
        border-width: 0 0 1px 0;
        position: relative;
    }

    .p-tabview-tab-header {
        cursor: pointer;
        user-select: none;
        display: flex;
        align-items: center;
        text-decoration: none;
        position: relative;
        overflow: hidden;
        border-style: solid;
        border-width: 0 0 1px 0;
        border-color: transparent transparent dt('tabview.tab.border.color') transparent;
        color: dt('tabview.tab.color');
        padding: 1rem 1.125rem;
        font-weight: 600;
        border-top-right-radius: dt('border.radius.md');
        border-top-left-radius: dt('border.radius.md');
        transition:
            color dt('tabview.transition.duration'),
            outline-color dt('tabview.transition.duration');
        margin: 0 0 -1px 0;
        outline-color: transparent;
    }

    .p-tabview-tablist-item:not(.p-disabled) .p-tabview-tab-header:focus-visible {
        outline: dt('focus.ring.width') dt('focus.ring.style') dt('focus.ring.color');
        outline-offset: -1px;
    }

    .p-tabview-tablist-item:not(.p-highlight):not(.p-disabled):hover > .p-tabview-tab-header {
        color: dt('tabview.tab.hover.color');
    }

    .p-tabview-tablist-item.p-highlight > .p-tabview-tab-header {
        color: dt('tabview.tab.active.color');
    }

    .p-tabview-tab-title {
        line-height: 1;
        white-space: nowrap;
    }

    .p-tabview-next-button,
    .p-tabview-prev-button {
        position: absolute;
        top: 0;
        margin: 0;
        padding: 0;
        z-index: 2;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: dt('tabview.nav.button.background');
        color: dt('tabview.nav.button.color');
        width: 2.5rem;
        border-radius: 0;
        outline-color: transparent;
        transition:
            color dt('tabview.transition.duration'),
            outline-color dt('tabview.transition.duration');
        box-shadow: dt('tabview.nav.button.shadow');
        border: none;
        cursor: pointer;
        user-select: none;
    }

    .p-tabview-next-button:focus-visible,
    .p-tabview-prev-button:focus-visible {
        outline: dt('focus.ring.width') dt('focus.ring.style') dt('focus.ring.color');
        outline-offset: dt('focus.ring.offset');
    }

    .p-tabview-next-button:hover,
    .p-tabview-prev-button:hover {
        color: dt('tabview.nav.button.hover.color');
    }

    .p-tabview-prev-button {
        left: 0;
    }

    .p-tabview-next-button {
        right: 0;
    }

    .p-tabview-panels {
        background: dt('tabview.tab.panel.background');
        color: dt('tabview.tab.panel.color');
        padding: 0.875rem 1.125rem 1.125rem 1.125rem;
    }

    .p-tabview-ink-bar {
        z-index: 1;
        display: block;
        position: absolute;
        bottom: -1px;
        height: 1px;
        background: dt('tabview.tab.active.border.color');
        transition: 250ms cubic-bezier(0.35, 0, 0.25, 1);
    }
`,classes:{root:function(e){return[`p-tabview p-component`,{"p-tabview-scrollable":e.props.scrollable}]},navContainer:`p-tabview-tablist-container`,prevButton:`p-tabview-prev-button`,navContent:`p-tabview-tablist-scroll-container`,nav:`p-tabview-tablist`,tab:{header:function(e){var t=e.instance,n=e.tab,r=e.index;return[`p-tabview-tablist-item`,t.getTabProp(n,`headerClass`),{"p-tabview-tablist-item-active":t.d_activeIndex===r,"p-disabled":t.getTabProp(n,`disabled`)}]},headerAction:`p-tabview-tab-header`,headerTitle:`p-tabview-tab-title`,content:function(e){var t=e.instance,n=e.tab;return[`p-tabview-panel`,t.getTabProp(n,`contentClass`)]}},inkbar:`p-tabview-ink-bar`,nextButton:`p-tabview-next-button`,panelContainer:`p-tabview-panels`}}),O={name:`TabView`,extends:{name:`BaseTabView`,extends:t,props:{activeIndex:{type:Number,default:0},lazy:{type:Boolean,default:!1},scrollable:{type:Boolean,default:!1},tabindex:{type:Number,default:0},selectOnFocus:{type:Boolean,default:!1},prevButtonProps:{type:null,default:null},nextButtonProps:{type:null,default:null},prevIcon:{type:String,default:void 0},nextIcon:{type:String,default:void 0}},style:D,provide:function(){return{$pcTabs:void 0,$pcTabView:this,$parentInstance:this}}},inheritAttrs:!1,emits:[`update:activeIndex`,`tab-change`,`tab-click`],data:function(){return{d_activeIndex:this.activeIndex,isPrevButtonDisabled:!0,isNextButtonDisabled:!1}},watch:{activeIndex:function(e){this.d_activeIndex=e,this.scrollInView({index:e})}},mounted:function(){console.warn(`Deprecated since v4. Use Tabs component instead.`),this.updateInkBar(),this.scrollable&&this.updateButtonState()},updated:function(){this.updateInkBar(),this.scrollable&&this.updateButtonState()},methods:{isTabPanel:function(e){return e.type.name===`TabPanel`},isTabActive:function(e){return this.d_activeIndex===e},getTabProp:function(e,t){return e.props?e.props[t]:void 0},getKey:function(e,t){return this.getTabProp(e,`header`)||t},getTabHeaderActionId:function(e){return`${this.$id}_${e}_header_action`},getTabContentId:function(e){return`${this.$id}_${e}_content`},getTabPT:function(e,t,n){var r=this.tabs.length,i={props:e.props,parent:{instance:this,props:this.$props,state:this.$data},context:{index:n,count:r,first:n===0,last:n===r-1,active:this.isTabActive(n)}};return p(this.ptm(`tabpanel.${t}`,{tabpanel:i}),this.ptm(`tabpanel.${t}`,i),this.ptmo(this.getTabProp(e,`pt`),t,i))},onScroll:function(e){this.scrollable&&this.updateButtonState(),e.preventDefault()},onPrevButtonClick:function(){var e=this.$refs.content,t=o(e),n=e.scrollLeft-t;e.scrollLeft=n<=0?0:n},onNextButtonClick:function(){var e=this.$refs.content,t=o(e)-this.getVisibleButtonWidths(),n=e.scrollLeft+t,r=e.scrollWidth-t;e.scrollLeft=n>=r?r:n},onTabClick:function(e,t,n){this.changeActiveIndex(e,t,n),this.$emit(`tab-click`,{originalEvent:e,index:n})},onTabKeyDown:function(e,t,n){switch(e.code){case`ArrowLeft`:this.onTabArrowLeftKey(e);break;case`ArrowRight`:this.onTabArrowRightKey(e);break;case`Home`:this.onTabHomeKey(e);break;case`End`:this.onTabEndKey(e);break;case`PageDown`:this.onPageDownKey(e);break;case`PageUp`:this.onPageUpKey(e);break;case`Enter`:case`NumpadEnter`:case`Space`:this.onTabEnterKey(e,t,n);break}},onTabArrowRightKey:function(e){var t=this.findNextHeaderAction(e.target.parentElement);t?this.changeFocusedTab(e,t):this.onTabHomeKey(e),e.preventDefault()},onTabArrowLeftKey:function(e){var t=this.findPrevHeaderAction(e.target.parentElement);t?this.changeFocusedTab(e,t):this.onTabEndKey(e),e.preventDefault()},onTabHomeKey:function(e){var t=this.findFirstHeaderAction();this.changeFocusedTab(e,t),e.preventDefault()},onTabEndKey:function(e){var t=this.findLastHeaderAction();this.changeFocusedTab(e,t),e.preventDefault()},onPageDownKey:function(e){this.scrollInView({index:this.$refs.nav.children.length-2}),e.preventDefault()},onPageUpKey:function(e){this.scrollInView({index:0}),e.preventDefault()},onTabEnterKey:function(e,t,n){this.changeActiveIndex(e,t,n),e.preventDefault()},findNextHeaderAction:function(e){var t=arguments.length>1&&arguments[1]!==void 0&&arguments[1]?e:e.nextElementSibling;return t?i(t,`data-p-disabled`)||i(t,`data-pc-section`)===`inkbar`?this.findNextHeaderAction(t):m(t,`[data-pc-section="headeraction"]`):null},findPrevHeaderAction:function(e){var t=arguments.length>1&&arguments[1]!==void 0&&arguments[1]?e:e.previousElementSibling;return t?i(t,`data-p-disabled`)||i(t,`data-pc-section`)===`inkbar`?this.findPrevHeaderAction(t):m(t,`[data-pc-section="headeraction"]`):null},findFirstHeaderAction:function(){return this.findNextHeaderAction(this.$refs.nav.firstElementChild,!0)},findLastHeaderAction:function(){return this.findPrevHeaderAction(this.$refs.nav.lastElementChild,!0)},changeActiveIndex:function(e,t,n){!this.getTabProp(t,`disabled`)&&this.d_activeIndex!==n&&(this.d_activeIndex=n,this.$emit(`update:activeIndex`,n),this.$emit(`tab-change`,{originalEvent:e,index:n}),this.scrollInView({index:n}))},changeFocusedTab:function(e,t){if(t&&(c(t),this.scrollInView({element:t}),this.selectOnFocus)){var n=parseInt(t.parentElement.dataset.pcIndex,10),r=this.tabs[n];this.changeActiveIndex(e,r,n)}},scrollInView:function(e){var t=e.element,n=e.index,r=n===void 0?-1:n,i=t||this.$refs.nav.children[r];i&&i.scrollIntoView&&i.scrollIntoView({block:`nearest`})},updateInkBar:function(){var e=this.$refs.nav.children[this.d_activeIndex];this.$refs.inkbar.style.width=o(e)+`px`,this.$refs.inkbar.style.left=g(e).left-g(this.$refs.nav).left+`px`},updateButtonState:function(){var e=this.$refs.content,t=e.scrollLeft,n=e.scrollWidth,r=o(e);this.isPrevButtonDisabled=t===0,this.isNextButtonDisabled=parseInt(t)===n-r},getVisibleButtonWidths:function(){var e=this.$refs;return[e.prevBtn,e.nextBtn].reduce(function(e,t){return t?e+o(t):e},0)}},computed:{tabs:function(){var e=this;return this.$slots.default().reduce(function(t,n){return e.isTabPanel(n)?t.push(n):n.children&&n.children instanceof Array&&n.children.forEach(function(n){e.isTabPanel(n)&&t.push(n)}),t},[])},prevButtonAriaLabel:function(){return this.$primevue.config.locale.aria?this.$primevue.config.locale.aria.previous:void 0},nextButtonAriaLabel:function(){return this.$primevue.config.locale.aria?this.$primevue.config.locale.aria.next:void 0}},directives:{ripple:e},components:{ChevronLeftIcon:T,ChevronRightIcon:E}};function k(e){"@babel/helpers - typeof";return k=typeof Symbol==`function`&&typeof Symbol.iterator==`symbol`?function(e){return typeof e}:function(e){return e&&typeof Symbol==`function`&&e.constructor===Symbol&&e!==Symbol.prototype?`symbol`:typeof e},k(e)}function A(e,t){var n=Object.keys(e);if(Object.getOwnPropertySymbols){var r=Object.getOwnPropertySymbols(e);t&&(r=r.filter(function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable})),n.push.apply(n,r)}return n}function j(e){for(var t=1;t<arguments.length;t++){var n=arguments[t]==null?{}:arguments[t];t%2?A(Object(n),!0).forEach(function(t){M(e,t,n[t])}):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(n)):A(Object(n)).forEach(function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(n,t))})}return e}function M(e,t,n){return(t=N(t))in e?Object.defineProperty(e,t,{value:n,enumerable:!0,configurable:!0,writable:!0}):e[t]=n,e}function N(e){var t=P(e,`string`);return k(t)==`symbol`?t:t+``}function P(e,t){if(k(e)!=`object`||!e)return e;var n=e[Symbol.toPrimitive];if(n!==void 0){var r=n.call(e,t);if(k(r)!=`object`)return r;throw TypeError(`@@toPrimitive must return a primitive value.`)}return(t===`string`?String:Number)(e)}var F=[`tabindex`,`aria-label`],I=[`data-p-active`,`data-p-disabled`,`data-pc-index`],L=[`id`,`tabindex`,`aria-disabled`,`aria-selected`,`aria-controls`,`onClick`,`onKeydown`],R=[`tabindex`,`aria-label`],z=[`id`,`aria-labelledby`,`data-pc-index`,`data-p-active`];function B(e,t,r,i,o,c){var d=C(`ripple`);return u(),y(`div`,p({class:e.cx(`root`),role:`tablist`},e.ptmi(`root`)),[h(`div`,p({class:e.cx(`navContainer`)},e.ptm(`navContainer`)),[e.scrollable&&!o.isPrevButtonDisabled?n((u(),y(`button`,p({key:0,ref:`prevBtn`,type:`button`,class:e.cx(`prevButton`),tabindex:e.tabindex,"aria-label":c.prevButtonAriaLabel,onClick:t[0]||=function(){return c.onPrevButtonClick&&c.onPrevButtonClick.apply(c,arguments)}},j(j({},e.prevButtonProps),e.ptm(`prevButton`)),{"data-pc-group-section":`navbutton`}),[w(e.$slots,`previcon`,{},function(){return[(u(),b(s(e.prevIcon?`span`:`ChevronLeftIcon`),p({"aria-hidden":`true`,class:e.prevIcon},e.ptm(`prevIcon`)),null,16,[`class`]))]})],16,F)),[[d]]):v(``,!0),h(`div`,p({ref:`content`,class:e.cx(`navContent`),onScroll:t[1]||=function(){return c.onScroll&&c.onScroll.apply(c,arguments)}},e.ptm(`navContent`)),[h(`ul`,p({ref:`nav`,class:e.cx(`nav`)},e.ptm(`nav`)),[(u(!0),y(l,null,S(c.tabs,function(t,r){return u(),y(`li`,p({key:c.getKey(t,r),style:c.getTabProp(t,`headerStyle`),class:e.cx(`tab.header`,{tab:t,index:r}),role:`presentation`},{ref_for:!0},j(j(j({},c.getTabProp(t,`headerProps`)),c.getTabPT(t,`root`,r)),c.getTabPT(t,`header`,r)),{"data-pc-name":`tabpanel`,"data-p-active":o.d_activeIndex===r,"data-p-disabled":c.getTabProp(t,`disabled`),"data-pc-index":r}),[n((u(),y(`a`,p({id:c.getTabHeaderActionId(r),class:e.cx(`tab.headerAction`),tabindex:c.getTabProp(t,`disabled`)||!c.isTabActive(r)?-1:e.tabindex,role:`tab`,"aria-disabled":c.getTabProp(t,`disabled`),"aria-selected":c.isTabActive(r),"aria-controls":c.getTabContentId(r),onClick:function(e){return c.onTabClick(e,t,r)},onKeydown:function(e){return c.onTabKeyDown(e,t,r)}},{ref_for:!0},j(j({},c.getTabProp(t,`headerActionProps`)),c.getTabPT(t,`headerAction`,r))),[t.props&&t.props.header?(u(),y(`span`,p({key:0,class:e.cx(`tab.headerTitle`)},{ref_for:!0},c.getTabPT(t,`headerTitle`,r)),x(t.props.header),17)):v(``,!0),t.children&&t.children.header?(u(),b(s(t.children.header),{key:1})):v(``,!0)],16,L)),[[d]])],16,I)}),128)),h(`li`,p({ref:`inkbar`,class:e.cx(`inkbar`),role:`presentation`,"aria-hidden":`true`},e.ptm(`inkbar`)),null,16)],16)],16),e.scrollable&&!o.isNextButtonDisabled?n((u(),y(`button`,p({key:1,ref:`nextBtn`,type:`button`,class:e.cx(`nextButton`),tabindex:e.tabindex,"aria-label":c.nextButtonAriaLabel,onClick:t[2]||=function(){return c.onNextButtonClick&&c.onNextButtonClick.apply(c,arguments)}},j(j({},e.nextButtonProps),e.ptm(`nextButton`)),{"data-pc-group-section":`navbutton`}),[w(e.$slots,`nexticon`,{},function(){return[(u(),b(s(e.nextIcon?`span`:`ChevronRightIcon`),p({"aria-hidden":`true`,class:e.nextIcon},e.ptm(`nextIcon`)),null,16,[`class`]))]})],16,R)),[[d]]):v(``,!0)],16),h(`div`,p({class:e.cx(`panelContainer`)},e.ptm(`panelContainer`)),[(u(!0),y(l,null,S(c.tabs,function(t,r){return u(),y(l,{key:c.getKey(t,r)},[!e.lazy||c.isTabActive(r)?n((u(),y(`div`,p({key:0,id:c.getTabContentId(r),style:c.getTabProp(t,`contentStyle`),class:e.cx(`tab.content`,{tab:t}),role:`tabpanel`,"aria-labelledby":c.getTabHeaderActionId(r)},{ref_for:!0},j(j(j({},c.getTabProp(t,`contentProps`)),c.getTabPT(t,`root`,r)),c.getTabPT(t,`content`,r)),{"data-pc-name":`tabpanel`,"data-pc-index":r,"data-p-active":o.d_activeIndex===r}),[(u(),b(s(t)))],16,z)),[[a,e.lazy?!0:c.isTabActive(r)]]):v(``,!0)],64)}),128))],16)],16)}O.render=B;var V=f.extend({name:`tabpanel`,classes:{root:function(e){return[`p-tabpanel`,{"p-tabpanel-active":e.instance.active}]}}}),H={name:`TabPanel`,extends:{name:`BaseTabPanel`,extends:t,props:{value:{type:[String,Number],default:void 0},as:{type:[String,Object],default:`DIV`},asChild:{type:Boolean,default:!1},header:null,headerStyle:null,headerClass:null,headerProps:null,headerActionProps:null,contentStyle:null,contentClass:null,contentProps:null,disabled:Boolean},style:V,provide:function(){return{$pcTabPanel:this,$parentInstance:this}}},inheritAttrs:!1,inject:[`$pcTabs`],computed:{active:function(){return r(this.$pcTabs?.d_value,this.value)},id:function(){return`${this.$pcTabs?.$id}_tabpanel_${this.value}`},ariaLabelledby:function(){return`${this.$pcTabs?.$id}_tab_${this.value}`},attrs:function(){return p(this.a11yAttrs,this.ptmi(`root`,this.ptParams))},a11yAttrs:function(){return{id:this.id,tabindex:this.$pcTabs?.tabindex,role:`tabpanel`,"aria-labelledby":this.ariaLabelledby,"data-pc-name":`tabpanel`,"data-p-active":this.active}},ptParams:function(){return{context:{active:this.active}}}}};function U(e,t,r,i,o,c){var f,m;return c.$pcTabs?(u(),y(l,{key:1},[e.asChild?w(e.$slots,`default`,{key:1,class:d(e.cx(`root`)),active:c.active,a11yAttrs:c.a11yAttrs}):(u(),y(l,{key:0},[!((f=c.$pcTabs)!=null&&f.lazy)||c.active?n((u(),b(s(e.as),p({key:0,class:e.cx(`root`)},c.attrs),{default:_(function(){return[w(e.$slots,`default`)]}),_:3},16,[`class`])),[[a,(m=c.$pcTabs)!=null&&m.lazy?!0:c.active]]):v(``,!0)],64))],64)):w(e.$slots,`default`,{key:0})}H.render=U;export{O as n,H as t};