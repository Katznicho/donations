# Donation v1 Api Documentation

Api documentation for VXPTS v1.

## BASE_URL: https://dashboard.fountainofpeace.org.ug


# Donation v1 Api Documentation

Api documentation for VXPTS v1.

## BASE_URL: https://dashboard.fountainofpeace.org.ug

### Get Children by Pagination

Endpoint to retrieve children with pagination.

- **URL:** `/api/getAllhildrenByPagination`

- **Method:** `GET`

- **Query Parameters:**
  - `limit` (optional): Number of items per page (default: 100)
  - `page` (optional): Page number (default: 1)
  - `sort_order` (optional): Sort order for results (default: desc)
  - `is_sponsored` (optional): Filter by sponsorship status (default: false)
  - `total_sponsors` (optional): Filter by total sponsors (default: 0)

- **Response:**
  - `response`: "success" or "failed"
  - `data`: Object containing the children data and pagination details
    - `data`: Array of children objects
    - `pagination`: Pagination details
      - `total`: Total number of items
      - `current_page`: Current page number
      - `per_page`: Number of items per page
      - `last_page`: Last page number
      - `from`: Index of the first item on the current page

### Get Mothers by Pagination

Endpoint to retrieve mothers with pagination.

- **URL:** `/api/getAllMothersByPagination`

- **Method:** `GET`

- **Query Parameters:**
  - `limit` (optional): Number of items per page (default: 100)
  - `page` (optional): Page number (default: 1)
  - `sort_order` (optional): Sort order for results (default: desc)
  - `is_sponsored` (optional): Filter by sponsorship status (default: false)
  - `total_sponsors` (optional): Filter by total sponsors (default: 0)

- **Response:**
  - `response`: "success" or "failed"
  - `data`: Object containing the mothers data and pagination details
    - `data`: Array of mothers objects
    - `pagination`: Pagination details
      - `total`: Total number of items
      - `current_page`: Current page number
      - `per_page`: Number of items per page
      - `last_page`: Last page number
      - `from`: Index of the first item on the current page

### Get Child by ID

Endpoint to retrieve a child by ID.

- **URL:** `/api/children/{id}`
- **Method:** `GET`
- **Parameters:**
  - `id` (required): ID of the child
- **Response:**
  - `response`: "success" or "failed"
  - `data`: Object containing the child data

### Get Mother by ID

Endpoint to retrieve a mother by ID.

- **URL:** `/api/mothers/{id}`
- **Method:** `GET`
- **Parameters:**
  - `id` (required): ID of the mother
- **Response:**
  - `response`: "success" or "failed"
  - `data`: Object containing the mother data

### Get Children by Sponsor ID

Endpoint to retrieve children by sponsor ID.

- **URL:** `/api/children/sponsor/{sponsorId}`
- **Method:** `GET`
- **Parameters:**
  - `sponsorId` (required): ID of the sponsor
- **Response:**
  - `response`: "success" or "failed"
  - `data`: Array of children objects

### Get Mothers by Sponsor ID

Endpoint to retrieve mothers by sponsor ID.

- **URL:** `/api/mothers/sponsor/{sponsorId}`
- **Method:** `GET`
- **Parameters:**
  - `sponsorId` (required): ID of the sponsor
- **Response:**
  - `response`: "success" or "failed"
  - `data`: Array of mothers objects

### Get Child by Sponsor ID and Child ID

Endpoint to retrieve a child by sponsor ID and child ID.

- **URL:** `/api/children/sponsor/{sponsorId}/child/{childId}`
- **Method:** `GET`
- **Parameters:**
  - `sponsorId` (required): ID of the sponsor
  - `childId` (required): ID of the child
- **Response:**
  - `response`: "success" or "failed"
  - `data`: Object containing the child data

### Get Mother by Sponsor ID and Mother ID

Endpoint to retrieve a mother by sponsor ID and mother ID.

- **URL:** `/api/mothers/sponsor/{sponsorId}/mother/{motherId}`
- **Method:** `GET`
- **Parameters:**
  - `sponsorId` (required): ID of the sponsor
  - `motherId` (required): ID of the mother
- **Response:**
  - `response`: "success" or "failed"
  - `data`: Object containing the mother data

### Sponsor a Child

Endpoint to sponsor a child.

- **URL:** `/api/sponsor-child`
- **Method:** `POST`
- **Request Body:**
  - `sponsor_id` (required): ID of the sponsor
  - `child_id` (required): ID of the child
- **Response:**
  - `response`: "success" or "failed"
  - `data`: Message indicating the status of the sponsorship

### Sponsor a Mother

Endpoint to sponsor a mother.

- **URL:** `/api/sponsor-mother`
- **Method:** `POST`
- **Request Body:**
  - `sponsor_id` (required): ID of the sponsor
  - `mother_id` (required): ID of the mother
- **Response:**
  - `response`: "success" or "failed"
  - `data`: Message indicating the status of the sponsorship

### Cancel Child Sponsorship

Endpoint to cancel a child sponsorship.

- **URL:** `/api/cancel-child-sponsor`
- **Method:** `POST`
- **Request Body:**
  - `sponsor_id` (required): ID of the sponsor
  - `child_id` (required): ID of the child
- **Response:**
  - `response`: "success" or "failed"
  - `data`: Message indicating the status of the cancellation

### Cancel Mother Sponsorship

Endpoint to cancel a mother sponsorship.

- **URL:** `/api/cancel-mother-sponsor`
- **Method:** `POST`
- **Request Body:**
  - `sponsor_id` (required): ID of the sponsor
  - `mother_id` (required): ID of the mother
- **Response:**
  - `response`: "success" or "failed"
  - `data`: Message indicating the status of the cancellation      
