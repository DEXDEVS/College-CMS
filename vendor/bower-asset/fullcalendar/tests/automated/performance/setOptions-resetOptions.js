import { Calendar } from '@fullcalendar/core'
import timeGridPlugin from '@fullcalendar/timegrid'
import { getFirstDateEl } from '../lib/ViewUtils'
import { getEventEls } from '../event-render/EventRenderUtils'
import { getTimeGridScroller, allDaySlotDisplayed } from '../lib/TimeGridViewUtils'

function buildOptions() {
  return {
    plugins: [ timeGridPlugin ],
    defaultView: 'timeGridWeek',
    defaultDate: '2019-04-01',
    scrollTime: '00:00',
    allDaySlot: true,
    events: [
      { start: '2019-04-01T00:00:00' },
      { start: '2019-04-01T02:00:00' }
    ]
  }
}

describeValues({
  setOptions: mutateOptionsViaChange,
  resetOptions: mutateOptionsViaReset
}, function(mutateOptions) {
  let $calendarEl
  let calendar

  beforeEach(function() {
    $calendarEl = $('<div>').appendTo('body')
  })

  afterEach(function() {
    if (calendar) { calendar.destroy() }
    $calendarEl.remove()
  })

  it('will react to a single option and keep scroll', function() {
    calendar = new Calendar($calendarEl[0], buildOptions())
    calendar.render()

    let scrollEl = getTimeGridScroller()
    scrollEl.scrollTop = 100
    let scrollTop = scrollEl.scrollTop
    expect(scrollTop).toBeGreaterThan(0)

    mutateOptions(calendar, { allDaySlot: false })

    expect(calendar.getOption('allDaySlot')).toBe(false)
    expect(allDaySlotDisplayed()).toBe(false)
    expect(getTimeGridScroller().scrollTop).toBe(scrollTop)
  })

  it('rerenders events without rerendering view', function() {
    calendar = new Calendar($calendarEl[0], buildOptions())
    calendar.render()
    let dateEl = getFirstDateEl()

    mutateOptions(calendar, {
      events: [
        { start: '2019-04-01T00:00:00' }
      ]
    })

    expect(getEventEls().length).toBe(1)
    expect(getFirstDateEl()).toBe(dateEl)
  })

  it('rerenders events when mutating same array', function() {
    let options = buildOptions()
    let { events } = options

    calendar = new Calendar($calendarEl[0], options)
    calendar.render()

    events.push({ start: '2019-04-01T05:00:00' })
    mutateOptions(calendar, { events })
    expect(calendar.getEvents().length).toBe(events.length)
  })

  it('doesn\'t rerender anything for a defaultView change', function() {
    calendar = new Calendar($calendarEl[0], buildOptions())
    calendar.render()
    let dateEl = getFirstDateEl()

    mutateOptions(calendar, {
      defaultView: 'timeGridDay'
    })

    expect(calendar.view.type).toBe('timeGridWeek')
    expect(getFirstDateEl()).toBe(dateEl)
  })

})

function mutateOptionsViaChange(calendar, changedOptions) {
  calendar.setOptions(changedOptions)
}

function mutateOptionsViaReset(calendar, changedOptions) {
  calendar.resetOptions({ ...buildOptions(), ...changedOptions })
}
