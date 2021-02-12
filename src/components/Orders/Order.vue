<template>
  <div>
    <div class="card border-bottom-danger mr-2 ml-2 shadow-lg">
      <div
        class="card-header py-3 d-flex flex-row align-items-center justify-content-between"
      >
        <h5 class="m-0 font-weight-bold">
          <span v-if="addNOrder == false"
            ><i class="fas fa-file-signature"></i> Orders</span
          >
          <span v-if="addNOrder == true"
            ><i class="fas fa-plus-circle"></i> Add New Order</span
          >
        </h5>

        <button
          v-if="addNOrder == false"
          @click="addOrderFunc('addNewOrder')"
          class="btn btn-danger btn-sm"
        >
          <i class="fas fa-plus-circle"></i> Add New Order
        </button>

        <button
          v-if="addNOrder == true"
          @click="addOrderFunc('orders')"
          class="btn btn-danger btn-sm"
        >
          <i class="fas fa-angle-double-left"></i> Back to Orders
        </button>
      </div>

      <div class="card-body" v-if="addNOrder == false">
        <!-- orders -->
        <CSpinner
          v-if="loading"
          style="width:4rem;height:4rem; margin: 0 auto; display: block"
          color="danger"
          grow
        />
        <CDataTable
          v-if="!loading"
          :items="orders"
          :fields="fields"
          column-filter
          table-filter
          :items-per-page="10"
          hover
          sorter
          pagination
        >
          <template #show_details="{item, id}">
            <td class="py-2">
              <CButton
                color="danger"
                variant="outline"
                square
                size="sm"
                @click="toggleDetails(item, id)"
              >
                {{ Boolean(item._toggled) ? "Hide" : "Show" }}
              </CButton>
            </td>
          </template>

          <template #details="{item}">
            <CCollapse
              :show="Boolean(item._toggled)"
              :duration="collapseDuration"
            >
              <CCardBody>
                <h4>
                  {{ item }}
                </h4>
                <p class="text-muted">User since: {{ item.description }}</p>
                <CButton size="sm" color="info" class="">
                  User Settings
                </CButton>
                <CButton size="sm" color="danger" class="ml-1">
                  Delete
                </CButton>
              </CCardBody>
            </CCollapse>
          </template>
        </CDataTable>
      </div>
      <add-order v-if="addNOrder == true" />
    </div>
  </div>
</template>

<script>
import axios from "axios";
import addOrder from "./AddOrder";
import store from "@/store";

export default {
  name: "Order",
  data() {
    return {
      addNOrder: false,
      loading: true,
      orders: [],
      fields: [
        { key: "project_id", label: "Project" },
        { key: "unit_id", label: "Unit" },
        { key: "service_id", label: "Service" },
        { key: "type", label: "Type" },
        { key: "description", label: "Description" },
        { key: "target_date", label: "Target Date" },
        { key: "time_from", label: "Time From" },
        { key: "time_to", label: "Time To" },
        {
          key: "show_details",
          label: "",
          _style: "width:1%",
          sorter: false,
          filter: false
        }
      ],
      details: [],
      collapseDuration: 0
    };
  },
  mounted() {
    // get Orders
    axios
      .post("get-orders")
      .then(response => {
        this.orders = response.data.orders;
        this.loading = false;
      })
      .catch(error => {
        console.log(error.response.data);
      });
  },
  methods: {
    // add order function
    addOrderFunc(e) {
      store.dispatch("auth/attempt", localStorage.getItem("access_token"));

      if (e == "addNewOrder") {
        this.addNOrder = true;
      } else {
        this.addNOrder = false;
      }
    },
    toggleDetails(order) {
      this.$set(order, "_toggled", !order._toggled);
      this.collapseDuration = 300;
      this.$nextTick(() => {
        this.collapseDuration = 0;
      });
    }
  },

  components: {
    addOrder
  }
};
</script>
