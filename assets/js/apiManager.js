class APIHandler {
   constructor(baseURL, headers) {
      this.baseURL = baseURL;
      this.headers = headers;
   }
  
   async get(url) {
      try {
        	const response = await fetch(this.baseURL + url, {
          	method: 'GET',
          	headers: this.headers,
        	});
        	const data = await response.json();
        	return data;
      } catch (error) {
        	console.error('Error in GET request:', error);
        	throw error;
      }
   }
  
   async post(url, body) {
      try {
        	const response = await fetch(this.baseURL + url, {
          	method: 'POST',
          	headers: this.headers,
          	body: JSON.stringify(body),
        	});
        	const data = await response.json();
        	return data;
      } catch (error) {
        	console.error('Error in POST request:', error);
        	throw error;
      }
   }
  
   async patch(url, body) {
      try {
        	const response = await fetch(this.baseURL + url, {
          	method: 'PATCH',
          	headers: this.headers,
          	body: JSON.stringify(body),
        	});
        	const data = await response.json();
        	return data;
      } catch (error) {
        console.error('Error in PATCH request:', error);
        throw error;
      }
   }
  
   async delete(url) {
      try {
        	const response = await fetch(this.baseURL + url, {
          	method: 'DELETE',
          	headers: this.headers,
        	});
        	const data = await response.json();
        	return data;
      } catch (error) {
        	console.error('Error in DELETE request:', error);
        	throw error;
      }
   }
}
  

const apiBaseURL = 'http://localhost:5200/';
//const apiBaseURL = 'https://motorepuestosapirest-production.up.railway.app/';
const apiHeaders = {
   'Content-Type': 'application/json',
};
const apiManager = new APIHandler(apiBaseURL, apiHeaders);
  


const dataCompany = () =>{
	let postData = {
		"direction": 1,
		"phone": 1,
		"social": true
  	}
	apiManager.post('client/company/', postData)
  	.then(response => {
    	const phones = response.dataPhone.map(item => item.phone).join(' - ');
		$("#h_company_direction_resume").html(response.dataDirection.resume);
		$("#f_company_direction_resume").html(response.dataDirection.resume);
		$("#f_company_direction_week").html(response.dataDirection.week);
		$("#f_company_direction_saturday").html(response.dataDirection.saturday);
		$("#f_company_direction_sunday").html(response.dataDirection.sunday);
		$("#h_company_direction_phone").html(phones);
  	})
  	.catch(error => {
    	console.error('POST error:', error);
  	});
}

//dataCompany();