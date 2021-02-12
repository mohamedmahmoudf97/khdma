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
        <CDataTable
          :items="orders"
          :fields="fields"
          column-filter
          table-filter
          :items-per-page="2"
          hover
          sorter
          pagination
        >
          <template #status="{item}">
            <td>
              <CBadge :color="getBadge(item.type)">
                {{ item.type }}
              </CBadge>
            </td>
          </template>
          <template #show_details="{item, id}">
            <td class="py-2">
              <CButton
                color="primary"
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
      orders: [],
      fields: [
        { key: "id" },
        { key: "project_id" },
        { key: "unit_id" },
        { key: "service_id" },
        { key: "type" },
        { key: "description" },
        { key: "target_date" },
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

    getBadge(status) {
      switch (status) {
        case "Active":
          return "success";
        case "Inactive":
          return "secondary";
        case "Pending":
          return "warning";
        case "Banned":
          return "danger";
        default:
          "primary";
      }
    },

    toggleDetails(order) {
      console.log(order.id);
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
