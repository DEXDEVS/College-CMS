import { DateSpan, Calendar } from '@fullcalendar/core'
import ResourceApi from './api/ResourceApi'
import { ResourceInput, parseResource, ResourceHash, Resource } from './structs/resource'
import { ResourceSourceInput } from './structs/resource-source'

declare module '@fullcalendar/core' {

  interface DatePointApi {
    resource?: ResourceApi
  }

  interface DateSpanApi {
    resource?: ResourceApi
  }

  interface Calendar {
    addResource(input: ResourceInput): ResourceApi
    getResourceById(id: string): ResourceApi | null
    getResources(): ResourceApi[]
    getTopLevelResources(): ResourceApi[]
    rerenderResources(): void
    refetchResources(): void
  }

  interface OptionsInput {
    schedulerLicenseKey?: string
    resources?: ResourceSourceInput

    // TODO: make these better
    resourceLabelText?: string
    resourceOrder?: any
    filterResourcesWithEvents?: any
    resourceText?: any
    resourceGroupField?: any
    resourceGroupText?: any
    resourceAreaWidth?: any
    resourceColumns?: any
    resourcesInitiallyExpanded?: any
    slotWidth?: any
    datesAboveResources?: any
    // callbacks...
    resourceRender?: any
  }

}

Calendar.prototype.addResource = function(this: Calendar, input: ResourceInput | ResourceApi, scrollTo = true) {
  let resourceHash: ResourceHash
  let resource: Resource

  if (input instanceof ResourceApi) {
    resource = input._resource
    resourceHash = { [resource.id]: resource }
  } else {
    resourceHash = {}
    resource = parseResource(input, '', resourceHash, this)
  }

  // HACK
  if (scrollTo) {
    this.component.view.addScroll({ forcedRowId: resource.id })
  }

  this.dispatch({
    type: 'ADD_RESOURCE',
    resourceHash
  })

  return new ResourceApi(this, resource)
}

Calendar.prototype.getResourceById = function(this: Calendar, id: string) {
  id = String(id)

  if (this.state.resourceStore) { // guard against calendar with no resource functionality
    let rawResource = this.state.resourceStore[id]

    if (rawResource) {
      return new ResourceApi(this, rawResource)
    }
  }

  return null
}

Calendar.prototype.getResources = function(this: Calendar): ResourceApi[] {
  let { resourceStore } = this.state
  let resourceApis: ResourceApi[] = []

  if (resourceStore) { // guard against calendar with no resource functionality
    for (let resourceId in resourceStore) {
      resourceApis.push(
        new ResourceApi(this, resourceStore[resourceId])
      )
    }
  }

  return resourceApis
}

Calendar.prototype.getTopLevelResources = function(this: Calendar): ResourceApi[] {
  let { resourceStore } = this.state
  let resourceApis: ResourceApi[] = []

  if (resourceStore) { // guard against calendar with no resource functionality
    for (let resourceId in resourceStore) {
      if (!resourceStore[resourceId].parentId) {
        resourceApis.push(
          new ResourceApi(this, resourceStore[resourceId])
        )
      }
    }
  }

  return resourceApis
}

Calendar.prototype.rerenderResources = function(this: Calendar) {
  this.dispatch({
    type: 'RESET_RESOURCES'
  })
}

Calendar.prototype.refetchResources = function(this: Calendar) {
  this.dispatch({
    type: 'REFETCH_RESOURCES'
  })
}

export function transformDatePoint(dateSpan: DateSpan, calendar: Calendar) {
  return dateSpan.resourceId ?
    { resource: calendar.getResourceById(dateSpan.resourceId) } :
    {}
}

export function transformDateSpan(dateSpan: DateSpan, calendar: Calendar) {
  return dateSpan.resourceId ?
    { resource: calendar.getResourceById(dateSpan.resourceId) } :
    {}
}
