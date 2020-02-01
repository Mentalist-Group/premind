import { shallowMount } from '@vue/test-utils'
import Home from '@/pages/Home.vue'

describe('Home.vue', () => {
  it('top page表示テスト', () => {
    const wrapper = shallowMount(Home)
    expect(wrapper.find('div').text()).toBe('top page')
  })
})