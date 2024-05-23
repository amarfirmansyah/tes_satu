import axios from "axios";

const BASEURL :string = "/collect";
class ProfessionService {
    async get () {
        return await axios.get(BASEURL + '/profession')
            .then(response => response)
    }
}

export default new ProfessionService();
