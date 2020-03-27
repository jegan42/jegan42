/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   ft_count_if.c                                      :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: jeagan <marvin@42.fr>                      +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2019/04/02 13:47:30 by jeagan            #+#    #+#             */
/*   Updated: 2019/04/02 13:47:31 by jeagan           ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

int	ft_count_if(char **tab, int (*f)(char*))
{
	int	i;
	int nb;

	i = 0;
	nb = 0;
	while (tab[i])
	{
		if ((*f)(tab[i]) == 1)
			++nb;
		i++;
	}
	return (nb);
}