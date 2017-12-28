const menusitems = (state) => state.menus.items;
const pageTitle = (state) => (({show_breadcrumbs,breadcrumbs}) => ({show_breadcrumbs,breadcrumbs}))(state.route.meta);

export {
    menusitems,
    pageTitle,
}
