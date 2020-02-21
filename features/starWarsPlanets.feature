Feature:
  In order to have correct results of planets
  As a user
  I want to have correctly mapped list of planets

  Scenario: It receives a response with planets
    When I send a "GET" request to "/star-wars-planets"
    Then the response status code should be 200
    And the response should be in JSON
    And the JSON node "data" should have 10 element
