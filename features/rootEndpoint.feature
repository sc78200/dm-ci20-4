Feature:
  In order to prove that my application is working
  As a user
  I want to have a functional root endpoint

  Scenario: It receives a response on the root endpoint
    When I send a "GET" request to "/"
    Then the response status code should be 200
    And the response should be in JSON
