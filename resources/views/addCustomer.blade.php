
<title>Add Customer</title>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    </head>
@extends('dashboard')
@section('content')
<form action="addCustomer" method="POST">
    @csrf
    <div class="col-xl">
        <div class="card mb-4">
          <div class="card-body">
            <form>
              <div class="mb-3">
                <label class="form-label" for="basic-icon-default-fullname">Name</label>
                <div class="input-group input-group-merge">
                  <span id="basic-icon-default-fullname2" class="input-group-text"
                    ><i class='bx bx-user'></i></i></span>
                  <input type="text"class="form-control" name="name" name="name" placeholder="Ali Bin Ahmad"aria-label="John Doe"aria-describedby="basic-icon-default-fullname2"/>
                </div>
              </div>
              @if ($errors->any())
              <div class="modal fade show" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="errorModalLabel">Errors</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                              <ul>
                                  @foreach ($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          </div>
                      </div>
                  </div>
              </div>
              <script>
                  window.onload = function () {
                      $('#errorModal').modal('show');
                  }
              </script>
          @endif
              <div class="mb-3">
                <label class="form-label" for="basic-icon-default-fullname">Address 1</label>
                <div class="input-group input-group-merge">
                  <span id="basic-icon-default-fullname2" class="input-group-text"
                    ><i class='bx bx-current-location'></i></span>
                  <input type="text"class="form-control" name="address1" name="address1" placeholder=""aria-label="John Doe"aria-describedby="basic-icon-default-fullname2"/>
                </div>
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-icon-default-fullname">Address 2</label>
                <div class="input-group input-group-merge">
                  <span id="basic-icon-default-fullname2" class="input-group-text"
                    ><i class='bx bx-current-location'></i></span>
                  <input type="text"class="form-control" name="address2" id="address2" placeholder=""aria-label="John Doe"aria-describedby="basic-icon-default-fullname2"/>
                </div>
              </div>
              <div class="mb-3">
                <label for="defaultSelect" class="form-label">State</label>
                <select class="form-select" id="state"name="state" aria-label="Default select example" onchange="updatePostcode()">
                    <option selected>Choose State</option>
                    <option value="Johor">Johor</option>
                    <option value="Kedah">Kedah</option>
                    <option value="Kelantan">Kelantan</option>
                    <option value="Melaka">Melaka</option>
                    <option value="Negeri Sembilan">Negeri Sembilan</option>
                    <option value="Pahang">Pahang</option>
                    <option value="Perak">Perak</option>
                    <option value="Perlis">Perlis</option>
                    <option value="Pulau Pinang">Pulau Pinang</option>
                    <option value="Selangor">Selangor</option>
                    <option value="Terengganu">Terengganu</option>
                    <option value="Sabah">Sabah</option>
                    <option value="Sarawak">Sarawak</option>
                    <option value="Wilayah Persekutuan Kuala Lumpur">Wilayah Persekutuan Kuala Lumpur</option>
                    <option value="Wilayah Persekutuan Putrajaya">Wilayah Persekutuan Putrajaya</option>
                    <option value="Wilayah Persekutuan Labuan">Wilayah Persekutuan Labuan</option>
                    </select>
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-icon-default-fullname">Postcode</label>
                <select class="form-select" id="postcode" name="postcode" aria-describedby="emailHelp" required>
                    <option value="">Select Postcode</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="defaultSelect" class="form-label">Person In Charge</label>
                <select id="defaultSelect" name="pic" id="pic" class="form-select multiple-select">
                    <option selected>Select Person in Charge (PIC)</option>
                    <option value="1">PIC 1</option>
                    <option value="2">PIC 2</option>
                    <option value="3">PIC 3</option>
                </select>
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-icon-default-fullname">Email</label>
                <div class="input-group input-group-merge">
                  <span id="basic-icon-default-fullname2" class="input-group-text"
                    ><i class='bx bx-envelope'></i></span>
                  <input
                    type="text"
                    class="form-control"
                    id="email"
                    name="email"
                    placeholder="abcd@efgh.com"
                    aria-label="John Doe"
                    aria-describedby="basic-icon-default-fullname2"
                  />
                </div>
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-icon-default-fullname">Subscription Start Date</label>
                <div class="input-group input-group-merge">
                  <input
                    type="date"
                    class="form-control"
                    id="subscription_start_date"
                    name="subscription_start_date"
                    placeholder="abcd@efgh.com"
                    aria-label="John Doe"
                    aria-describedby="basic-icon-default-fullname2"
                  />
                </div>
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-icon-default-company">Renewal Date</label>
                <div class="input-group input-group-merge">
                  <input
                    type="date"
                    id="renewal_date"
                    name="renewal_date"
                    class="form-control"
                    placeholder=""
                    aria-label="ACME Inc."
                    aria-describedby="basic-icon-default-company2"
                  />
                </div>
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-icon-default-company">Subscription</label>
                <div class="form-check mt-3">
                    <input class="form-check-input" type="checkbox" value="SIS/Billing" id="inlineCheckbox1" name="subscription[]" />
                    <label class="form-check-label" for="inlineCheckbox1"> SIS/Billing </label>
                  </div>
                  <div class="form-check mt-3">
                    <input class="form-check-input" type="checkbox" value="SIS+" id="inlineCheckbox2" name="subscription[]" />
                    <label class="form-check-label" for="inlineCheckbox2"> SIS+ </label>
                  </div>
                  <div class="form-check mt-3">
                    <input class="form-check-input" type="checkbox" value="Play" id="inlineCheckbox3" name="subscription[]" />
                    <label class="form-check-label" for="inlineCheckbox3"> Play </label>
                  </div>
                  <div class="form-check mt-3">
                    <input class="form-check-input" type="checkbox" value="Shop" id="inlineCheckbox4" name="subscription[]" />
                    <label class="form-check-label" for="inlineCheckbox4"> Shop </label>
                  </div>
                  <div class="form-check mt-3">
                    <input class="form-check-input" type="checkbox" value="Auto Integrate" id="inlineCheckbox5" name="subscription[]" />
                    <label class="form-check-label" for="inlineCheckbox5"> Auto Integrate </label>
                  </div>
                  <div class="form-check mt-3">
                    <input class="form-check-input" type="checkbox" value="Support" id="inlineCheckbox6" name="subscription[]" />
                    <label class="form-check-label" for="inlineCheckbox6"> Support </label>
                  </div>
                  <div><br>
              <button type="submit" class="btn btn-primary">Add Customer</button>
                  </div>
            </form>
          </div>
        </div>
      </div>

  </form>

@endsection
<script>
    function updatePostcode() {
        // Get the selected state
        var stateSelect = document.getElementById("state");
        var selectedState = stateSelect.options[stateSelect.selectedIndex].value;

        // Get the "Postcode" dropdown
        var postcodeSelect = document.getElementById("postcode");

        // Clear existing options
        postcodeSelect.innerHTML = '<option value="">Select Postcode</option>';

        // Add new options based on the selected state
        if (selectedState === "Johor") {
            // Add Johor postcodes
            addOption(postcodeSelect, "80000", "80000-Johor Bahru");
            addOption(postcodeSelect, "80100", "80100-Batu Pahat");
            addOption(postcodeSelect, "80000", "80000-Kluang");
            addOption(postcodeSelect, "80100", "80100-Kulai");
            addOption(postcodeSelect, "80000", "80000-Muar");
            addOption(postcodeSelect, "80100", "80100-Kota Tinggi");
            addOption(postcodeSelect, "80000", "80000-Segamat");
            addOption(postcodeSelect, "80100", "80100-Pontian");
            addOption(postcodeSelect, "80000", "80000-Tangkak");
            addOption(postcodeSelect, "80100", "80100-Mersing");
            // Add more postcodes for Johor
        } else if (selectedState === "Kedah") {
            // Add Kedah postcodes
            addOption(postcodeSelect, "80000", "80000-Sungai Petani");
            addOption(postcodeSelect, "80100", "80100-Alor Setar");
            addOption(postcodeSelect, "80000", "80000-Kulim");
            addOption(postcodeSelect, "80100", "80100-Kubang Pasu");
            addOption(postcodeSelect, "80000", "80000-Baling");
            addOption(postcodeSelect, "80100", "80100-Pendang");
            addOption(postcodeSelect, "80000", "80000-Langkawi");
            addOption(postcodeSelect, "80100", "80100-Yan");
            addOption(postcodeSelect, "80000", "80000-Sik");
            addOption(postcodeSelect, "80100", "80100-Padang Terap");
            addOption(postcodeSelect, "05000", "05000-Pokok Sena");
            addOption(postcodeSelect, "05100", "05100-Bandar Baharu");
            // Add more postcodes for Kedah
        } else if (selectedState === "Kelantan") {
    // Add Kelantan postcodes
    addOption(postcodeSelect, "15000", "15000-Kota Bharu");
    addOption(postcodeSelect, "15100", "15100-Pasir Mas");
    addOption(postcodeSelect, "16200", "16200-Tumpat");
    addOption(postcodeSelect, "16300", "16300-Bachok");
    addOption(postcodeSelect, "17500", "17500-Tanah Merah");
    addOption(postcodeSelect, "16800", "16800-Pasir Puteh");
    addOption(postcodeSelect, "18000", "18000-Kuala Krai");
    addOption(postcodeSelect, "18500", "18500-Machang");
    addOption(postcodeSelect, "18300", "18300-Gua Musang");
    addOption(postcodeSelect, "17600", "17600-Jeli");
    addOption(postcodeSelect, "16810", "16810-Lojing");
} else if (selectedState === "Melaka") {
    // Add Melaka postcodes
    addOption(postcodeSelect, "75000", "75000-Melaka Tengah");
    addOption(postcodeSelect, "78000", "78000-Alor Gajah");
    addOption(postcodeSelect, "77000", "77000-Jasin");
} else if (selectedState === "Negeri Sembilan") {
    // Add Negeri Sembilan postcodes
    addOption(postcodeSelect, "70000", "70000-Seremban");
    addOption(postcodeSelect, "72000", "72000-Jempol");
    addOption(postcodeSelect, "71000", "71000-Port Dickson");
    addOption(postcodeSelect, "73000", "73000-Tambin");
    addOption(postcodeSelect, "72000", "72000-Kuala Pilah");
    addOption(postcodeSelect, "71300", "71300-Rembau");
    addOption(postcodeSelect, "71700", "71700-Jelebu");
} else if (selectedState === "Pahang") {
    // Add Pahang postcodes
    addOption(postcodeSelect, "25000", "25000-Kuantan");
    addOption(postcodeSelect, "28000", "28000-Temerloh");
    addOption(postcodeSelect, "28700", "28700-Bentong");
    addOption(postcodeSelect, "26500", "26500-Maran");
    addOption(postcodeSelect, "26800", "26800-Rompin");
    addOption(postcodeSelect, "26600", "26600-Pekan");
    addOption(postcodeSelect, "28200", "28200-Bera");
    addOption(postcodeSelect, "27600", "27600-Raub");
    addOption(postcodeSelect, "27000", "27000-Jerantut");
    addOption(postcodeSelect, "27200", "27200-Lipis");
    addOption(postcodeSelect, "39000", "39000-Cameron Highlands");
// Add more conditions for other states and their respective postcodes
} else if (selectedState === "Perak") {
    addOption(postcodeSelect, "30000", "30000-Kinta");
    addOption(postcodeSelect, "34000", "34000-Larut, Matang dan Selama");
    addOption(postcodeSelect, "32000", "32000-Manjung");
    addOption(postcodeSelect, "36800", "36800-Hilir Perak");
    addOption(postcodeSelect, "34020", "34020-Kerian");
    addOption(postcodeSelect, "35900", "35900-Batang Padang");
    addOption(postcodeSelect, "33000", "33000-Kuala Kangsar");
    addOption(postcodeSelect, "36000", "36000-Perak Tengah");
    addOption(postcodeSelect, "33100", "33100-Hulu Perak");
    addOption(postcodeSelect, "31900", "31900-Kampar");
    addOption(postcodeSelect, "34100", "34100-Muallim");
    addOption(postcodeSelect, "36700", "36700-Bagan Datuk");
    // Add more postcodes for Perak
} else if (selectedState === "Perlis") {
    addOption(postcodeSelect, "01000", "01000-Kangar");
    // Add more postcodes for Perlis
} else if (selectedState === "Pulau Pinang") {
    addOption(postcodeSelect, "10100", "10100-Timur Laut");
    addOption(postcodeSelect, "13700", "13700-Seberang Perai Tengah");
    addOption(postcodeSelect, "13500", "13500-Seberang Perai Utara");
    addOption(postcodeSelect, "11900", "11900-Barat Daya");
    addOption(postcodeSelect, "13720", "13720-Seberang Perai Selatan");
    // Add more postcodes for Pulau Pinang
} else if (selectedState === "Sabah") {
    addOption(postcodeSelect, "88000", "88000-Kota Kinabalu");
    addOption(postcodeSelect, "91000", "91000-Tawau");
    addOption(postcodeSelect, "90000", "90000-Sandakan");
    addOption(postcodeSelect, "91100", "91100-Lahad Datu");
    addOption(postcodeSelect, "89050", "89050-Keningau");
    addOption(postcodeSelect, "90200", "90200-Kinabatangan");
    addOption(postcodeSelect, "91308", "91308-Semporna");
    addOption(postcodeSelect, "89608", "89608-Papar");
    addOption(postcodeSelect, "89500", "89500-Penampang");
    addOption(postcodeSelect, "90100", "90100-Beluran");
    addOption(postcodeSelect, "89200", "89200-Tuaran");
    addOption(postcodeSelect, "89300", "89300-Ranau");
    addOption(postcodeSelect, "89150", "89150-Kota Belud");
    addOption(postcodeSelect, "89058", "89058-Kudat");
    addOption(postcodeSelect, "89100", "89100-Kota Marudu");
    addOption(postcodeSelect, "89807", "89807-Beaufort");
    addOption(postcodeSelect, "91207", "91207-Kunak");
    addOption(postcodeSelect, "89900", "89900-Tenom");
    addOption(postcodeSelect, "89507", "89507-Putatan");
    addOption(postcodeSelect, "89857", "89857-Penampang");
    addOption(postcodeSelect, "89727", "89727-Tambunan");
    addOption(postcodeSelect, "89207", "89207-Tongod");
    addOption(postcodeSelect, "89850", "89850-Sipitang");
    addOption(postcodeSelect, "89908", "89908-Nabawan");
    addOption(postcodeSelect, "89600", "89600-Kuala Penyu");
    // Add more postcodes for Sabah
} else if (selectedState === "Sarawak") {
    addOption(postcodeSelect, "96800", "96800-Kapit");
    addOption(postcodeSelect, "98000", "98000-Miri");
    addOption(postcodeSelect, "97000", "97000-Bintulu");
    addOption(postcodeSelect, "96000", "96000-Sibu");
    addOption(postcodeSelect, "98700", "98700-Limbang");
    addOption(postcodeSelect, "96400", "96400-Mukah");
    addOption(postcodeSelect, "95000", "95000-Sri Aman");
    addOption(postcodeSelect, "93000", "93000-Kuching");
    addOption(postcodeSelect, "96100", "96100-Sarikei");
    addOption(postcodeSelect, "95700", "95700-Betong");
    addOption(postcodeSelect, "94300", "94300-Samarahan");
    addOption(postcodeSelect, "94700", "94700-Serian");
    // Add more postcodes for Sarawak
} else if (selectedState === "Selangor") {
    addOption(postcodeSelect, "46000", "46000-Petaling");
    addOption(postcodeSelect, "43100", "43100-Hulu Langat");
    addOption(postcodeSelect, "41000", "41000-Klang");
    addOption(postcodeSelect, "68100", "68100-Gombak");
    addOption(postcodeSelect, "42700", "42700-Kuala Langat");
    addOption(postcodeSelect, "43900", "43900-Sepang");
    addOption(postcodeSelect, "45000", "45000-Kuala Selangor");
    addOption(postcodeSelect, "44300", "44300-Hulu Selangor");
    addOption(postcodeSelect, "45200", "45200-Sabak Bernam");
    // Add more postcodes for Selangor
} else if (selectedState === "Terengganu") {
    addOption(postcodeSelect, "20000", "20000-Kuala Terengganu");
    addOption(postcodeSelect, "24000", "24000-Kemaman");
    addOption(postcodeSelect, "23000", "23000-Dungun");
    addOption(postcodeSelect, "22200", "22200-Besut");
    addOption(postcodeSelect, "21600", "21600-Marang");
    addOption(postcodeSelect, "21700", "21700-Hulu Terengganu");
    addOption(postcodeSelect, "22100", "22100-Setiu");
    addOption(postcodeSelect, "21100", "21100-Kuala Nerus");
    // Add more postcodes for Terengganu
} else if (selectedState === "Wilayah Persekutuan Kuala Lumpur") {
    addOption(postcodeSelect, "50000", "50000-Wilayah Persekutuan Kuala Lumpur");
    // Add more postcodes for Wilayah Persekutuan Kuala Lumpur
} else if (selectedState === "Wilayah Persekutuan Labuan") {
    addOption(postcodeSelect, "87000", "87000-Wilayah Persekutuan Labuan");
    // Add more postcodes for Wilayah Persekutuan Labuan
} else if (selectedState === "Wilayah Persekutuan Putrajaya") {
    addOption(postcodeSelect, "62000", "62000-Wilayah Persekutuan Putrajaya");
    // Add more postcodes for Wilayah Persekutuan Putrajaya
}

    }

function addOption(selectElement, value, text) {
  var option = document.createElement("option");
  option.value = value;
  option.text = text;
  selectElement.add(option);
}
</script>
<script>
    flatpickr("#subscriptionStartDate");
  </script>
<style>
    .form-check-inline {
        display: inline-flex;
        align-items: center;
    }
</style>
