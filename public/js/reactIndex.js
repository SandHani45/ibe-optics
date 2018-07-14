function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

var totalVec = new Array();

function Header() {
  return React.createElement(
    "h1",
    null,
    ""
  );
}

var ListItem = React.createClass({
  displayName: "ListItem",

  getInitialState: function getInitialState() {
    return { name: this.props.value.name, costo: this.props.value.costo, serviceCheck: this.props.value.checked };
  },
  render: function render() {
    return React.createElement(
      "div",
      { className: "row" },
      
      React.createElement(
        "div",
        { className: "checkTd col-md-2" },
        React.createElement(
          "div",
          { className: "flexcenter" },
          React.createElement("input", { type: "checkbox", name: "serviceCheck", id: "c" + this.props.value.id, checked: this.state.serviceCheck, onChange: this.handleChange }),
          React.createElement(
            "label",
            { htmlFor: "c" + this.props.value.id },
            React.createElement("span", null)
          )
        )
      ),
      React.createElement(
        "div",
        { className: "col-md-2" },
        React.createElement("input", { type: "text", name: "name", value: this.state.name, onChange: this.handleChange, placeholder: "Service name..." })
      ),
    );
  },

  handleChange: function handleChange(event) {
    var target = event.target;
    var name = target.name;
    var value = target.type === 'checkbox' ? target.checked : target.value;

    this.setState(_defineProperty({}, name, value), this.calcoloTotale);
  },

  componentDidMount: function componentDidMount() {
    var finalValue = 0;

    if (this.state.serviceCheck) {
      finalValue = this.state.costo * 1.0;
    } else {
      finalValue = 0;
    }

    totalVec[this.props.value.id] = finalValue;
    this.props.updateGlobalTotal();
  },

  calcoloTotale: function calcoloTotale() {
    var finalValue = 0;

    if (this.state.serviceCheck) {
      finalValue = this.state.costo * 1.0;
    } else {
      finalValue = 0;
    }

    totalVec[this.props.value.id] = finalValue;
    this.props.updateGlobalTotal();
  }
});

var Table = React.createClass({
  displayName: "Table",

  getInitialState: function getInitialState() {
    return { totale: 0, checked: false };
  },

  render: function render() {
    var _this = this;

    return React.createElement(
      "div",
      { className: "container" },
      React.createElement(
        "div",
        { className: "row" },
        React.createElement(
          "tr",
          null,
        ),
        this.props.items.map(function (prodotto) {
          return React.createElement(ListItem, { key: prodotto.id, value: prodotto, updateGlobalTotal: _this.updateGlobalTotal });
        }),
        React.createElement(
          "tr",
          React.createElement(
            "td",
            { className: "totalTR" },
            this.state.totale,
            " \u20AC"
          )
        )
      )
    );
  },

  updateGlobalTotal: function updateGlobalTotal() {
    var total = 0;
    for (var i = 0; i < this.props.ids; i++) {
      total += totalVec[i];
    }

    this.setState({ totale: total });
  }

});

var AddNewRow = React.createClass({
  displayName: "AddNewRow",

  render: function render() {
    return React.createElement(
      "div",
      null,
      React.createElement(
        "button",
        { onClick: this.props.onClick },
        "Add New"
      ),
      ""
    );
  }
});

var Save = React.createClass({
  displayName: "Save",

  render: function render() {
    return React.createElement(
      "div",
      { id: "reactButton" },
      React.createElement(
        "button",
        { onClick: this.props.onClick },
        "Save"
      ),
      ""
    );
  }
});

var Calculator = React.createClass({
  displayName: "Calculator",

  getInitialState: function getInitialState() {
    return {
      counter: this.props.len, lists: this.props.servizi
    };
  },

  render: function render() {
    return React.createElement(
      "div",
      { className: "container" },
      React.createElement(Header, null),
      React.createElement(Table, { items: this.state.lists, ids: this.state.counter }),
      React.createElement(AddNewRow, { onClick: this.addRow }),
    React.createElement(Save, { onClick: this.saveStat })
    );
  },

  addRow: function addRow() {
    this.setState({ counter: this.state.counter + 1 });
    var listItem = { id: this.state.counter, product: { name: "", costo: "0" } };
    var allItem = this.state.lists.concat([listItem]);
    this.setState({ lists: allItem });
  },

  saveStat: function saveStat() {
    var _this2 = this;
    $.ajax({
      type: "POST",
      url: "saveJson.php",
      dataType: 'json',
      data: { json: _this2.state.lists }
    });
  }

});

var servizi = [{ "id": "0", "name": "Example 1", "costo": "49", "checked": "true" }];

ReactDOM.render(React.createElement(Calculator, { servizi: servizi, len: servizi.length }), document.getElementById("focalLength"));