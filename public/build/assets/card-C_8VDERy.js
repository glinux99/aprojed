import{o as e}from"./button-JfsqUDkk.js";import{_n as t,c as n,dn as r,en as i,nn as a,rn as o,yn as s}from"./app-x8O5w0N6.js";var c={name:`Card`,extends:{name:`BaseCard`,extends:e,style:n.extend({name:`card`,style:`
    .p-card {
        background: dt('card.background');
        color: dt('card.color');
        box-shadow: dt('card.shadow');
        border-radius: dt('card.border.radius');
        display: flex;
        flex-direction: column;
    }

    .p-card-caption {
        display: flex;
        flex-direction: column;
        gap: dt('card.caption.gap');
    }

    .p-card-body {
        padding: dt('card.body.padding');
        display: flex;
        flex-direction: column;
        gap: dt('card.body.gap');
    }

    .p-card-title {
        font-size: dt('card.title.font.size');
        font-weight: dt('card.title.font.weight');
    }

    .p-card-subtitle {
        color: dt('card.subtitle.color');
    }
`,classes:{root:`p-card p-component`,header:`p-card-header`,body:`p-card-body`,caption:`p-card-caption`,title:`p-card-title`,subtitle:`p-card-subtitle`,content:`p-card-content`,footer:`p-card-footer`}}),provide:function(){return{$pcCard:this,$parentInstance:this}}},inheritAttrs:!1};function l(e,n,c,l,u,d){return t(),o(`div`,r({class:e.cx(`root`)},e.ptmi(`root`)),[e.$slots.header?(t(),o(`div`,r({key:0,class:e.cx(`header`)},e.ptm(`header`)),[s(e.$slots,`header`)],16)):a(``,!0),i(`div`,r({class:e.cx(`body`)},e.ptm(`body`)),[e.$slots.title||e.$slots.subtitle?(t(),o(`div`,r({key:0,class:e.cx(`caption`)},e.ptm(`caption`)),[e.$slots.title?(t(),o(`div`,r({key:0,class:e.cx(`title`)},e.ptm(`title`)),[s(e.$slots,`title`)],16)):a(``,!0),e.$slots.subtitle?(t(),o(`div`,r({key:1,class:e.cx(`subtitle`)},e.ptm(`subtitle`)),[s(e.$slots,`subtitle`)],16)):a(``,!0)],16)):a(``,!0),i(`div`,r({class:e.cx(`content`)},e.ptm(`content`)),[s(e.$slots,`content`)],16),e.$slots.footer?(t(),o(`div`,r({key:1,class:e.cx(`footer`)},e.ptm(`footer`)),[s(e.$slots,`footer`)],16)):a(``,!0)],16)],16)}c.render=l;export{c as t};