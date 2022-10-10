<x-app-layout>
    <x-slot name="header_content">
        <h1>Dashboard</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Layout</a></div>
            <div class="breadcrumb-item">Default Layout</div>
        </div>
    </x-slot>
    <div class="row">
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
          <div class="card card-statistics">
            <div class="card-body">
              <div class="d-flex flex-md-column flex-xl-row flex-wrap
              justify-content-between align-items-md-center justify-content-xl-between">
                <div class="float-left">
                  <em class="fa fa-2x fa-cube text-danger icon-lg"></em>
                </div>
                <div class="float-right">
                  <p class="mb-0 text-right">Total Amount</p>
                  <div class="fluid-container">
                    <h3 class="font-weight-medium text-right mb-0">${{ $amount }}</h3>
                  </div>
                </div>
              </div>
              <p class="text-muted mt-3 mb-0 text-left text-md-center text-xl-left">
                <em class="fa fa-exclamation mr-1" aria-hidden="true"></em> 65% lower growth </p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
          <div class="card card-statistics">
            <div class="card-body">
              <div class="d-flex flex-md-column flex-xl-row flex-wrap
              justify-content-between align-items-md-center justify-content-xl-between">
                <div class="float-left">
                  <em class="fa fa-2x fa-receipt text-warning icon-lg"></em>
                </div>
                <div class="float-right">
                  <p class="mb-0 text-right">Orders</p>
                  <div class="fluid-container">
                    <h3 class="font-weight-medium text-right mb-0">{{ $orders }}</h3>
                  </div>
                </div>
              </div>
              <p class="text-muted mt-3 mb-0 text-left text-md-center text-xl-left">
                <em class="fa fa-bookmark mr-1" aria-hidden="true"></em> Product-wise sales </p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
          <div class="card card-statistics">
            <div class="card-body">
              <div class="d-flex flex-md-column flex-xl-row flex-wrap
              justify-content-between align-items-md-center justify-content-xl-between">
                <div class="float-left">
                  <em class="fa fa-2x fa-poll text-success icon-lg"></em>
                </div>
                <div class="float-right">
                  <p class="mb-0 text-right">Items</p>
                  <div class="fluid-container">
                    <h3 class="font-weight-medium text-right mb-0">{{ $items }}</h3>
                  </div>
                </div>
              </div>
              <p class="text-muted mt-3 mb-0 text-left text-md-center text-xl-left">
                <em class="fa fa-calendar mr-1" aria-hidden="true"></em> Weekly Sales </p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
          <div class="card card-statistics">
            <div class="card-body">
              <div class="d-flex flex-md-column flex-xl-row flex-wrap
              justify-content-between align-items-md-center justify-content-xl-between">
                <div class="float-left">
                  <em class="fa fa-2x fa-user text-info icon-lg"></em>
                </div>
                <div class="float-right">
                  <p class="mb-0 text-right">Contacts</p>
                  <div class="fluid-container">
                    <h3 class="font-weight-medium text-right mb-0">{{ $contacts }}</h3>
                  </div>
                </div>
              </div>
              <p class="text-muted mt-3 mb-0 text-left text-md-center text-xl-left">
                <em class="fa  fa-spinner fa-spin-pulse mr-1" aria-hidden="true"></em> Product-wise sales </p>
            </div>
          </div>
        </div>
      </div>
</x-app-layout>
