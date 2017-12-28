const state = {
  items: [  // 什么菜单都不定义，完全由后端返回
  ]
}

const mutations = {
  add_menu (state, menuItems) {
    if (menuItems.length > 0) {
      state.items.push(menuItems)
    }
  },
  delete_menu (state, menuItems) {
      state.items = []
  },
}

export default {
    state,
    mutations
}
